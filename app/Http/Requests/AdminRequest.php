<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required | min:3 | max:15 | unique:admins,name',
            'passwd' => 'required | min:6 | max:20'
        ];
    }

    public function messages()
    {
       return [
           'name.required'=>'账号不能为空',
           'passwd.required'=>'密码不能为空',
           'name.unique' => '用户名重复，请重新输入！'
       ];
    }
}
