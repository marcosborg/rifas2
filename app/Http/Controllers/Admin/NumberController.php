<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNumberRequest;
use App\Http\Requests\StoreNumberRequest;
use App\Http\Requests\UpdateNumberRequest;
use App\Models\Award;
use App\Models\Benefactor;
use App\Models\Number;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NumberController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Number::with(['award', 'benefactor'])->select(sprintf('%s.*', (new Number())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'number_show';
                $editGate = 'number_edit';
                $deleteGate = 'number_delete';
                $crudRoutePart = 'numbers';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->editColumn('donation', function ($row) {
                return $row->donation ? $row->donation : '';
            });
            $table->editColumn('start_number', function ($row) {
                return $row->start_number ? $row->start_number : '';
            });
            $table->editColumn('end_number', function ($row) {
                return $row->end_number ? $row->end_number : '';
            });
            $table->addColumn('award_name', function ($row) {
                return $row->award ? $row->award->name : '';
            });

            $table->addColumn('benefactor_name', function ($row) {
                return $row->benefactor ? $row->benefactor->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'award', 'benefactor']);

            return $table->make(true);
        }

        return view('admin.numbers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('number_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awards = Award::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $benefactors = Benefactor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.numbers.create', compact('awards', 'benefactors'));
    }

    public function store(StoreNumberRequest $request)
    {
        $number = Number::create($request->all());

        return redirect()->route('admin.numbers.index');
    }

    public function edit(Number $number)
    {
        abort_if(Gate::denies('number_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awards = Award::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $benefactors = Benefactor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $number->load('award', 'benefactor');

        return view('admin.numbers.edit', compact('awards', 'benefactors', 'number'));
    }

    public function update(UpdateNumberRequest $request, Number $number)
    {
        $number->update($request->all());

        return redirect()->route('admin.numbers.index');
    }

    public function show(Number $number)
    {
        abort_if(Gate::denies('number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $number->load('award', 'benefactor');

        return view('admin.numbers.show', compact('number'));
    }

    public function destroy(Number $number)
    {
        abort_if(Gate::denies('number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $number->delete();

        return back();
    }

    public function massDestroy(MassDestroyNumberRequest $request)
    {
        Number::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
