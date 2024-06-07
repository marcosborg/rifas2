<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlayRequest;
use App\Http\Requests\StorePlayRequest;
use App\Http\Requests\UpdatePlayRequest;
use App\Models\Play;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PlayController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('play_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Play::query()->select(sprintf('%s.*', (new Play())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'play_show';
                $editGate = 'play_edit';
                $deleteGate = 'play_delete';
                $crudRoutePart = 'plays';

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
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : '';
            });
            $table->editColumn('play', function ($row) {
                return $row->play ? $row->play : '';
            });
            $table->editColumn('selection', function ($row) {
                return $row->selection ? $row->selection : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.plays.index');
    }

    public function create()
    {
        abort_if(Gate::denies('play_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plays.create');
    }

    public function store(StorePlayRequest $request)
    {
        $play = Play::create($request->all());

        return redirect()->route('admin.plays.index');
    }

    public function edit(Play $play)
    {
        abort_if(Gate::denies('play_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plays.edit', compact('play'));
    }

    public function update(UpdatePlayRequest $request, Play $play)
    {
        $play->update($request->all());

        return redirect()->route('admin.plays.index');
    }

    public function show(Play $play)
    {
        abort_if(Gate::denies('play_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plays.show', compact('play'));
    }

    public function destroy(Play $play)
    {
        abort_if(Gate::denies('play_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $play->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlayRequest $request)
    {
        Play::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
