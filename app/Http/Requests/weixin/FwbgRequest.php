<?php

namespace App\Http\Requests\weixin;

use Illuminate\Foundation\Http\FormRequest;

class FwbgRequest extends FormRequest
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
            'now-fw'=>' required ',
            'change-fw'=>' required ',
            'shuoming'=>' required ',
        ];
    }
    public function messages()
    {

        return [
            'now-fw.required'=>'现住房号 不能为空',
            'change-fw.required'=>'变更房号 不能为空',
            'shuoming.required'=>'说明 不能为空'
        ];
    }
}
