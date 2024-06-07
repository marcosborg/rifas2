<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStarPlayRequest;
use App\Http\Requests\StoreStarPlayRequest;
use App\Http\Requests\UpdateStarPlayRequest;
use App\Models\Star;
use App\Models\StarPlay;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StarPlaysController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('star_play_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StarPlay::with(['user', 'star'])->select(sprintf('%s.*', (new StarPlay)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'star_play_show';
                $editGate      = 'star_play_edit';
                $deleteGate    = 'star_play_delete';
                $crudRoutePart = 'star-plays';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('user.email', function ($row) {
                return $row->user ? (is_string($row->user) ? $row->user : $row->user->email) : '';
            });
            $table->addColumn('star_name', function ($row) {
                return $row->star ? $row->star->name : '';
            });

            $table->editColumn('star.start_date', function ($row) {
                return $row->star ? (is_string($row->star) ? $row->star : $row->star->start_date) : '';
            });
            $table->editColumn('star.end_date', function ($row) {
                return $row->star ? (is_string($row->star) ? $row->star : $row->star->end_date) : '';
            });
            $table->editColumn('star.donation', function ($row) {
                return $row->star ? (is_string($row->star) ? $row->star : $row->star->donation) : '';
            });
            $table->editColumn('star.limit', function ($row) {
                return $row->star ? (is_string($row->star) ? $row->star : $row->star->limit) : '';
            });
            $table->editColumn('payed', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->payed ? 'checked' : null) . '>';
            });
            $table->editColumn('confirmed', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->confirmed ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'star', 'payed', 'confirmed']);

            return $table->make(true);
        }

        return view('admin.starPlays.index');
    }

    public function create()
    {
        abort_if(Gate::denies('star_play_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stars = Star::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.starPlays.create', compact('stars', 'users'));
    }

    public function store(StoreStarPlayRequest $request)
    {
        $starPlay = StarPlay::create($request->all());

        return redirect()->route('admin.star-plays.index');
    }

    public function edit(StarPlay $starPlay)
    {
        abort_if(Gate::denies('star_play_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $stars = Star::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $starPlay->load('user', 'star');

        return view('admin.starPlays.edit', compact('starPlay', 'stars', 'users'));
    }

    public function update(UpdateStarPlayRequest $request, StarPlay $starPlay)
    {
        $starPlay->update($request->all());

        return redirect()->route('admin.star-plays.index');
    }

    public function show(StarPlay $starPlay)
    {
        abort_if(Gate::denies('star_play_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $starPlay->load('user', 'star');

        return view('admin.starPlays.show', compact('starPlay'));
    }

    public function destroy(StarPlay $starPlay)
    {
        abort_if(Gate::denies('star_play_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $starPlay->delete();

        return back();
    }

    public function massDestroy(MassDestroyStarPlayRequest $request)
    {
        $starPlays = StarPlay::find(request('ids'));

        foreach ($starPlays as $starPlay) {
            $starPlay->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
