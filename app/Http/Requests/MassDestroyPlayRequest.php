<?php

namespace App\Http\Requests;

use App\Models\Play;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPlayRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('play_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:plays,id',
        ];
    }
}
