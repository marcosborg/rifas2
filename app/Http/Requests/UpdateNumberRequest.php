<?php

namespace App\Http\Requests;

use App\Models\Number;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNumberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('number_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'donation' => [
                'required',
            ],
            'start_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'end_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'award_id' => [
                'required',
                'integer',
            ],
            'benefactor_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
