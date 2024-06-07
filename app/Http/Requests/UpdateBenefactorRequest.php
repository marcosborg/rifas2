<?php

namespace App\Http\Requests;

use App\Models\Benefactor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBenefactorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('benefactor_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
        ];
    }
}
