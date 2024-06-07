<?php

namespace App\Http\Requests;

use App\Models\Win;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWinRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('win_edit');
    }

    public function rules()
    {
        return [
            'star_id' => [
                'required',
                'integer',
            ],
            'star_play_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
