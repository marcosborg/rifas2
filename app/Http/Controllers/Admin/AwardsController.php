<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAwardRequest;
use App\Http\Requests\StoreAwardRequest;
use App\Http\Requests\UpdateAwardRequest;
use App\Models\Award;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AwardsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('award_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Award::query()->select(sprintf('%s.*', (new Award)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'award_show';
                $editGate      = 'award_edit';
                $deleteGate    = 'award_delete';
                $crudRoutePart = 'awards';

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
            $table->editColumn('credits', function ($row) {
                return $row->credits ? $row->credits : '';
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo']);

            return $table->make(true);
        }

        return view('admin.awards.index');
    }

    public function create()
    {
        abort_if(Gate::denies('award_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.awards.create');
    }

    public function store(StoreAwardRequest $request)
    {
        $award = Award::create($request->all());

        if ($request->input('photo', false)) {
            $award->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $award->id]);
        }

        return redirect()->route('admin.awards.index');
    }

    public function edit(Award $award)
    {
        abort_if(Gate::denies('award_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.awards.edit', compact('award'));
    }

    public function update(UpdateAwardRequest $request, Award $award)
    {
        $award->update($request->all());

        if ($request->input('photo', false)) {
            if (! $award->photo || $request->input('photo') !== $award->photo->file_name) {
                if ($award->photo) {
                    $award->photo->delete();
                }
                $award->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($award->photo) {
            $award->photo->delete();
        }

        return redirect()->route('admin.awards.index');
    }

    public function show(Award $award)
    {
        abort_if(Gate::denies('award_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.awards.show', compact('award'));
    }

    public function destroy(Award $award)
    {
        abort_if(Gate::denies('award_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $award->delete();

        return back();
    }

    public function massDestroy(MassDestroyAwardRequest $request)
    {
        $awards = Award::find(request('ids'));

        foreach ($awards as $award) {
            $award->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('award_create') && Gate::denies('award_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Award();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}