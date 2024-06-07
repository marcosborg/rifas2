<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayRequest;
use App\Http\Requests\UpdatePlayRequest;
use App\Http\Resources\Admin\PlayResource;
use App\Models\Play;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('play_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlayResource(Play::all());
    }

    public function store(StorePlayRequest $request)
    {
        $play = Play::create($request->all());

        return (new PlayResource($play))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Play $play)
    {
        abort_if(Gate::denies('play_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlayResource($play);
    }

    public function update(UpdatePlayRequest $request, Play $play)
    {
        $play->update($request->all());

        return (new PlayResource($play))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Play $play)
    {
        abort_if(Gate::denies('play_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $play->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
