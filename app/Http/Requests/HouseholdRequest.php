<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseholdRequest extends FormRequest
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
            'username'=>' required | unique:households,username',
            'realname'=>' required ',
            'cardId'=>[
                ' required ',
                ' unique:households,cardId',
                'regex:/(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx])|([1−9]\d5\d2((0[1−9])|(10|11|12))(([0−2][1−9])|10|20|30|31)\d2[0−9Xx])/'
            ],
            'phone'=>[
                ' required ',
                'min: 7',
                'max:11',
                ' unique:households,phone'
            ],
            'start'=>'required',
            'address'=>'required | unique:households,address',
            'village'=>'required',
            'contract' => 'required',
            'peoples' => 'required',
            'water_meter'=>'required',
            'electric_meter'=>'required',
        ];
    }

    public function messages(){

        return [

            'phone.required'=>'手机号 不能为空',
            'phone.size'=>'手机号为11位',

            'realname.required'=>'姓名 不能为空',

            'cardId.required'=>'身份证 不能为空',
            'cardId.unique'=>'该身份证已经被使用',
            'cardId.regex'=>'请输入正确的身份证',

            'start.required'=>'入住时间 不能为空',

            'address.required'=>'住址 不能为空',
            'address.unique'=>'该房屋 已出租',

            'village.required'=>'小区 不能为空',
            'contract.required' => '签约费用不能为空',
            'peoples.required' => '入住人数不能为空',
            'electric_meter.required' => '电表号不能为空',
            'water_meter.required' => '水表号不能为空',
        ];
    }
}
