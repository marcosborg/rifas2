<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNumberPlayRequest;
use App\Http\Requests\StoreNumberPlayRequest;
use App\Http\Requests\UpdateNumberPlayRequest;
use App\Models\Number;
use App\Models\NumberPlay;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NumberPlaysController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('number_play_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NumberPlay::with(['user', 'number'])->select(sprintf('%s.*', (new NumberPlay())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'number_play_show';
                $editGate = 'number_play_edit';
                $deleteGate = 'number_play_delete';
                $crudRoutePart = 'number-plays';

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
            $table->addColumn('number_name', function ($row) {
                return $row->number ? $row->number->name : '';
            });

            $table->editColumn('number.start_date', function ($row) {
                return $row->number ? (is_string($row->number) ? $row->number : $row->number->start_date) : '';
            });
            $table->editColumn('number.end_date', function ($row) {
                return $row->number ? (is_string($row->number) ? $row->number : $row->number->end_date) : '';
            });
            $table->editColumn('number.donation', function ($row) {
                return $row->number ? (is_string($row->number) ? $row->number : $row->number->donation) : '';
            });
            $table->editColumn('number.start_number', function ($row) {
                return $row->number ? (is_string($row->number) ? $row->number : $row->number->start_number) : '';
            });
            $table->editColumn('number.end_number', function ($row) {
                return $row->number ? (is_string($row->number) ? $row->number : $row->number->end_number) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user', 'number']);

            return $table->make(true);
        }

        return view('admin.numberPlays.index');
    }

    public function create()
    {
        abort_if(Gate::denies('number_play_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $numbers = Number::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.numberPlays.create', compact('numbers', 'users'));
    }

    public function store(StoreNumberPlayRequest $request)
    {
        $numberPlay = NumberPlay::create($request->all());

        return redirect()->route('admin.number-plays.index');
    }

    public function edit(NumberPlay $numberPlay)
    {
        abort_if(Gate::denies('number_play_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $numbers = Number::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $numberPlay->load('user', 'number');

        return view('admin.numberPlays.edit', compact('numberPlay', 'numbers', 'users'));
    }

    public function update(UpdateNumberPlayRequest $request, NumberPlay $numberPlay)
    {
        $numberPlay->update($request->all());

        return redirect()->route('admin.number-plays.index');
    }

    public function show(NumberPlay $numberPlay)
    {
        abort_if(Gate::denies('number_play_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $numberPlay->load('user', 'number');

        return view('admin.numberPlays.show', compact('numberPlay'));
    }

    public function destroy(NumberPlay $numberPlay)
    {
        abort_if(Gate::denies('number_play_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $numberPlay->delete();

        return back();
    }

    public function massDestroy(MassDestroyNumberPlayRequest $request)
    {
        NumberPlay::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
