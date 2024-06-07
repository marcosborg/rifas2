<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBenefactorRequest;
use App\Http\Requests\StoreBenefactorRequest;
use App\Http\Requests\UpdateBenefactorRequest;
use App\Models\Benefactor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BenefactorController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('benefactor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Benefactor::query()->select(sprintf('%s.*', (new Benefactor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'benefactor_show';
                $editGate = 'benefactor_edit';
                $deleteGate = 'benefactor_delete';
                $crudRoutePart = 'benefactors';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.benefactors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('benefactor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.benefactors.create');
    }

    public function store(StoreBenefactorRequest $request)
    {
        $benefactor = Benefactor::create($request->all());

        return redirect()->route('admin.benefactors.index');
    }

    public function edit(Benefactor $benefactor)
    {
        abort_if(Gate::denies('benefactor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.benefactors.edit', compact('benefactor'));
    }

    public function update(UpdateBenefactorRequest $request, Benefactor $benefactor)
    {
        $benefactor->update($request->all());

        return redirect()->route('admin.benefactors.index');
    }

    public function show(Benefactor $benefactor)
    {
        abort_if(Gate::denies('benefactor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.benefactors.show', compact('benefactor'));
    }

    public function destroy(Benefactor $benefactor)
    {
        abort_if(Gate::denies('benefactor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $benefactor->delete();

        return back();
    }

    public function massDestroy(MassDestroyBenefactorRequest $request)
    {
        Benefactor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
