<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description'=>'required|max:255',
            'category'=>'required',
            'text' => 'required'
        ];
    }
}
