<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'country' => 'nullable|max:255',
        ];
    }
}
