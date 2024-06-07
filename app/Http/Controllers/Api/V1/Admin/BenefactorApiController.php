<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBenefactorRequest;
use App\Http\Requests\UpdateBenefactorRequest;
use App\Http\Resources\Admin\BenefactorResource;
use App\Models\Benefactor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BenefactorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('benefactor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BenefactorResource(Benefactor::all());
    }

    public function store(StoreBenefactorRequest $request)
    {
        $benefactor = Benefactor::create($request->all());

        return (new BenefactorResource($benefactor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Benefactor $benefactor)
    {
        abort_if(Gate::denies('benefactor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BenefactorResource($benefactor);
    }

    public function update(UpdateBenefactorRequest $request, Benefactor $benefactor)
    {
        $benefactor->update($request->all());

        return (new BenefactorResource($benefactor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Benefactor $benefactor)
    {
        abort_if(Gate::denies('benefactor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $benefactor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
