<?php

namespace App\Http\Requests;

use App\Models\StarPlay;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStarPlayRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('star_play_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:star_plays,id',
        ];
    }
}
