<?php

namespace App\Http\Requests;

use App\Models\Star;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('star_create');
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
            'limit' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'award_id' => [
                'required',
                'integer',
            ],
            'benefectors.*' => [
                'integer',
            ],
            'benefectors' => [
                'required',
                'array',
            ],
            'star_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'star_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
