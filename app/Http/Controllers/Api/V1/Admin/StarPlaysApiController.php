<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStarPlayRequest;
use App\Http\Requests\UpdateStarPlayRequest;
use App\Http\Resources\Admin\StarPlayResource;
use App\Models\StarPlay;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StarPlaysApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('star_play_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StarPlayResource(StarPlay::with(['user', 'star'])->get());
    }

    public function store(StoreStarPlayRequest $request)
    {
        $starPlay = StarPlay::create($request->all());

        return (new StarPlayResource($starPlay))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StarPlay $starPlay)
    {
        abort_if(Gate::denies('star_play_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StarPlayResource($starPlay->load(['user', 'star']));
    }

    public function update(UpdateStarPlayRequest $request, StarPlay $starPlay)
    {
        $starPlay->update($request->all());

        return (new StarPlayResource($starPlay))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StarPlay $starPlay)
    {
        abort_if(Gate::denies('star_play_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $starPlay->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
