<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStarRequest;
use App\Http\Requests\UpdateStarRequest;
use App\Http\Resources\Admin\StarResource;
use App\Models\Star;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StarApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('star_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StarResource(Star::with(['award', 'benefectors'])->get());
    }

    public function store(StoreStarRequest $request)
    {
        $star = Star::create($request->all());
        $star->benefectors()->sync($request->input('benefectors', []));

        return (new StarResource($star))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Star $star)
    {
        abort_if(Gate::denies('star_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StarResource($star->load(['award', 'benefectors']));
    }

    public function update(UpdateStarRequest $request, Star $star)
    {
        $star->update($request->all());
        $star->benefectors()->sync($request->input('benefectors', []));

        return (new StarResource($star))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Star $star)
    {
        abort_if(Gate::denies('star_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $star->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
