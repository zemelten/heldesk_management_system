<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileStoreRequest extends FormRequest
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
          
            'email' => ['nullable', 'email'],
            'phone_no' => ['required', 'regex:/^(\07|0)9[0-9]{8}/'],
            'building_id' => ['nullable', 'exists:buildings,id'],
            'campus_id' => ['nullable', 'exists:campuses,id'],
            'organizational_unit_id' => [
                'nullable',
                'exists:organizational_units,id',
            ],
            'user_id' => ['nullable', 'exists:users,id'],
            'office_num' => ['nullable', 'max:255', 'string'],
        ];
    }
}
