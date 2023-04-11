<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSupportStoreRequest extends FormRequest
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
            'user_id' => ['nullable', 'exists:users,id'],
            'user_type' => ['nullable', 'max:255'],
            'problem_catagory_id' => [
                'nullable',
                'exists:problem_catagories,id',
            ],
            'building_id' => ['nullable', 'exists:buildings,id'],
            'service_unit_id' => ['required', 'exists:service_units,id'],
            'unit_id' => ['required', 'exists:units,id'],
        ];
    }
}
