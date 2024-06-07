<?php

namespace App\Http\Requests;

use App\Models\StarPlay;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStarPlayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('star_play_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'star_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
