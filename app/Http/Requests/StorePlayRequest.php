<?php

namespace App\Http\Requests;

use App\Models\Play;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePlayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('play_create');
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'play' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'selection' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
