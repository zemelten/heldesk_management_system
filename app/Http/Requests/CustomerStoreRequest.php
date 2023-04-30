<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'phone_no' => 'regex:/(^(\07|09)\d{3})-?\d{6}$/',
            'building_id' => ['nullable', 'exists:buildings,id'],
            'campus_id' => ['nullable', 'exists:campuses,id'],
            'organizational_unit_id' => [
                'nullable',
                'exists:organizational_units,id',
            ],
            'floor_id' => ['nullable', 'exists:floors,id'],
            'user_id' => ['nullable', 'exists:users,id'],
            'office_num' => ['nullable', 'max:255', 'string'],
            'is_edited' => ['nullable', 'max:255'],
        ];
    }
}
