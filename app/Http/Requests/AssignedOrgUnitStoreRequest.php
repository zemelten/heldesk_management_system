<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignedOrgUnitStoreRequest extends FormRequest
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
            'assigned_office_id' => ['nullable', 'exists:assigned_offices,id'],
            'organizational_unit_id' => [
                'nullable',
                'exists:organizational_units,id',
            ],
        ];
    }
}
