<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStarRequest;
use App\Http\Requests\StoreStarRequest;
use App\Http\Requests\UpdateStarRequest;
use App\Models\Award;
use App\Models\Benefactor;
use App\Models\Star;
use App\Models\StarPlay;
use App\Models\Win;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StarController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('star_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Star::with(['award', 'benefectors'])->select(sprintf('%s.*', (new Star())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'star_show';
                $editGate = 'star_edit';
                $deleteGate = 'star_delete';
                $crudRoutePart = 'stars';

                return view(
                    'partials.datatablesActions',
                    compact(
                        'viewGate',
                        'editGate',
                        'deleteGate',
                        'crudRoutePart',
                        'row'
                    )
                );
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
            $table->editColumn('limit', function ($row) {
                return $row->limit ? $row->limit : '';
            });
            $table->addColumn('award_name', function ($row) {
                return $row->award ? $row->award->name : '';
            });

            $table->editColumn('benefectors', function ($row) {
                $labels = [];
                foreach ($row->benefectors as $benefector) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $benefector->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('star_1', function ($row) {
                return $row->star_1 ? $row->star_1 : '';
            });
            $table->editColumn('star_2', function ($row) {
                return $row->star_2 ? $row->star_2 : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'award', 'benefectors']);

            return $table->make(true);
        }

        return view('admin.stars.index');
    }

    public function create()
    {
        abort_if(Gate::denies('star_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awards = Award::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $benefectors = Benefactor::pluck('name', 'id');

        return view('admin.stars.create', compact('awards', 'benefectors'));
    }

    public function store(StoreStarRequest $request)
    {
        $star = Star::create($request->all());
        $star->benefectors()->sync($request->input('benefectors', []));

        return redirect()->route('admin.stars.index');
    }

    public function edit(Star $star)
    {
        abort_if(Gate::denies('star_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $awards = Award::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $benefectors = Benefactor::pluck('name', 'id');

        $star->load('award', 'benefectors');

        return view('admin.stars.edit', compact('awards', 'benefectors', 'star'));
    }

    public function update(UpdateStarRequest $request, Star $star)
    {

        $star->update($request->all());
        $star->benefectors()->sync($request->input('benefectors', []));

        //CHECK WINNERS

        $star_plays = StarPlay::whereHas('plays', function ($query) use ($star) {
            $query->where(function ($query) use ($star) {
                $query->where('selection', $star->star_1)
                    ->orWhere('selection', $star->star_2);
            });
        })
            ->where('payed', 1)
            ->where('star_id', $star->id)->get()->load('plays');

        foreach ($star_plays as $star_play) {
            $win = new Win;
            $win->star_id = $star->id;
            $win->star_play_id = $star_play->id;
            $win->user_id = $star_play->user_id;
            $win->save();
        }

        return redirect()->route('admin.stars.index');
    }

    public function show(Star $star)
    {
        abort_if(Gate::denies('star_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $star->load('award', 'benefectors');

        return view('admin.stars.show', compact('star'));
    }

    public function destroy(Star $star)
    {
        abort_if(Gate::denies('star_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $star->delete();

        return back();
    }

    public function massDestroy(MassDestroyStarRequest $request)
    {
        Star::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}