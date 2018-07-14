<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Xuzu;

class XzTzController extends Controller
{
    //续租
    public function xuzu($data){
        
        $xuzu = new Xuzu;
        $xuzu->realname = $data->name;
        $xuzu->phone = $data->phone_num;
        $xuzu->cardId = $data->id_card;
        $xuzu->address = $data->user_add;
        $xuzu->village = $data->village;
        $xuzu->time = $data->xuzu_time;

        if($xuzu->save()){
            return [

                'errno'=>0,
                'errmsg'=>'发送申请成功'
            ];
        }else {
            return [

                'errno'=>1,
                'errmsg'=>'发送申请失败,请检查发送数据'
            ];
        }
    }
}
