<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySlideRequest;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Models\Slide;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SlideController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('slide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slides = Slide::with(['media'])->get();

        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        abort_if(Gate::denies('slide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slides.create');
    }

    public function store(StoreSlideRequest $request)
    {
        $slide = Slide::create($request->all());

        if ($request->input('image', false)) {
            $slide->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $slide->id]);
        }

        return redirect()->route('admin.slides.index');
    }

    public function edit(Slide $slide)
    {
        abort_if(Gate::denies('slide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slides.edit', compact('slide'));
    }

    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        $slide->update($request->all());

        if ($request->input('image', false)) {
            if (! $slide->image || $request->input('image') !== $slide->image->file_name) {
                if ($slide->image) {
                    $slide->image->delete();
                }
                $slide->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($slide->image) {
            $slide->image->delete();
        }

        return redirect()->route('admin.slides.index');
    }

    public function show(Slide $slide)
    {
        abort_if(Gate::denies('slide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slides.show', compact('slide'));
    }

    public function destroy(Slide $slide)
    {
        abort_if(Gate::denies('slide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slide->delete();

        return back();
    }

    public function massDestroy(MassDestroySlideRequest $request)
    {
        $slides = Slide::find(request('ids'));

        foreach ($slides as $slide) {
            $slide->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('slide_create') && Gate::denies('slide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Slide();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
