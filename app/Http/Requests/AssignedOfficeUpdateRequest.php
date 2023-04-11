<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignedOfficeUpdateRequest extends FormRequest
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
            'office_number' => ['nullable', 'max:255', 'string'],
            'building_id' => ['nullable', 'exists:buildings,id'],
        ];
    }
}
