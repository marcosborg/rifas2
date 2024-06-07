<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAwardRequest;
use App\Http\Requests\UpdateAwardRequest;
use App\Http\Resources\Admin\AwardResource;
use App\Models\Award;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AwardsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('award_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AwardResource(Award::all());
    }

    public function store(StoreAwardRequest $request)
    {
        $award = Award::create($request->all());

        if ($request->input('photo', false)) {
            $award->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new AwardResource($award))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Award $award)
    {
        abort_if(Gate::denies('award_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AwardResource($award);
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

        return (new AwardResource($award))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Award $award)
    {
        abort_if(Gate::denies('award_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $award->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}