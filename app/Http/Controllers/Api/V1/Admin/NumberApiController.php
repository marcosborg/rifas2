<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNumberRequest;
use App\Http\Requests\UpdateNumberRequest;
use App\Http\Resources\Admin\NumberResource;
use App\Models\Number;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NumberApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NumberResource(Number::with(['award', 'benefactor'])->get());
    }

    public function store(StoreNumberRequest $request)
    {
        $number = Number::create($request->all());

        return (new NumberResource($number))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Number $number)
    {
        abort_if(Gate::denies('number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NumberResource($number->load(['award', 'benefactor']));
    }

    public function update(UpdateNumberRequest $request, Number $number)
    {
        $number->update($request->all());

        return (new NumberResource($number))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Number $number)
    {
        abort_if(Gate::denies('number_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $number->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
