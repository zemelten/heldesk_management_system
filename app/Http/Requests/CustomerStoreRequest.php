<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerStoreRequest extends FormRequest
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
            'full_name' => ['nullable',  'max:255', 'string'],
            'email' => ['nullable', 'email'],
            'phone_no' => ['required', 'regex:/^(\0)9|7[0-9]{8}/', 
            Rule::unique('customers')->where(function ($query) {
                return $query->where('phone_no', request('phone'));
            })],
            'building_id' => ['nullable'],
            'campus_id' => ['nullable'],
            'organizational_unit_id' => [
                'nullable',
              
            ],
            'floor_id' => ['nullable'],
            'user_id' => ['nullable', 'exists:users,id'],
            'office_num' => ['nullable', 'max:255', 'string'],
            'is_edited' => ['nullable', 'max:255'],
        ];
    }
}
