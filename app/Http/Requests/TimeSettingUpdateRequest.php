<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeSettingUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'time' => ['required', 'max:255'],
<<<<<<< HEAD
=======
            'type' => ['required'],
>>>>>>> ed1045e654c2741bceb7317ca5650a2bfa8a0242
        ];
    }
}
