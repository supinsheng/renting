<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoreRequest extends FormRequest
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
            'username' => 'required | min:3 | max:15',
            'password' => 'required'
        ];
    }

    // public function messages()
    // {
    //    return [
    //        'username.rquired'=>'用户名不能为空',
    //        'password.rquired'=>'密码不能为空'
    //    ];
    // }
}

