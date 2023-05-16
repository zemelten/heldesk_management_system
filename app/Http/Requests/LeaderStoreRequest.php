<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'user_id'=>['required'],
            'phone' => ['required', 'regex:/^(07|09|)([0-9]{8})$/', 
            Rule::unique('leaders')->where(function ($query) {
                return $query->where('phone', request('phone'));
            })],
            'email' => ['email'],
            'director_id' => ['nullable'],

        ];
    }
}
