<?php

namespace App\Http\Requests;

use App\Models\NumberPlay;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNumberPlayRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('number_play_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:number_plays,id',
        ];
    }
}
