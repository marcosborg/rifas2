<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNumberPlayRequest;
use App\Http\Requests\UpdateNumberPlayRequest;
use App\Http\Resources\Admin\NumberPlayResource;
use App\Models\NumberPlay;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NumberPlaysApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('number_play_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NumberPlayResource(NumberPlay::with(['user', 'number'])->get());
    }

    public function store(StoreNumberPlayRequest $request)
    {
        $numberPlay = NumberPlay::create($request->all());

        return (new NumberPlayResource($numberPlay))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NumberPlay $numberPlay)
    {
        abort_if(Gate::denies('number_play_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NumberPlayResource($numberPlay->load(['user', 'number']));
    }

    public function update(UpdateNumberPlayRequest $request, NumberPlay $numberPlay)
    {
        $numberPlay->update($request->all());

        return (new NumberPlayResource($numberPlay))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NumberPlay $numberPlay)
    {
        abort_if(Gate::denies('number_play_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $numberPlay->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
