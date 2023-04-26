<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaderStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => ['nullable', 'max:255', 'string'],
            'sex' => ['in:male,female'],
            'phone' => ['max:12', 'integer'],
            'email' => ['email'],
            'director_id' => ['nullable'],

        ];
    }
}
