<?php

namespace App\Http\Requests;

use App\Models\NumberPlay;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNumberPlayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('number_play_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'number_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
