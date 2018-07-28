<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CelueRequest extends FormRequest
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
            'title'=>'required | min:  | max:255',
            'description'=>'required | min:20'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'description.required'=>'内容 不能为空'
    //     ];
    // }
}
