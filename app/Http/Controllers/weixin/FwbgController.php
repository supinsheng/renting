<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\weixin\FwbgRequest;
use App\Model\House_change;

class FwbgController extends Controller
{
    public  function  index(){
        return view("Weixin.fwbg");
    }
    public  function  store(FwbgRequest $req){
        //获取表单数据
        $data=$req->all();
        //实例化模型
        $house_change=new House_change;
        //提交变更房间申请
        $house_change->id = null;
        $house_change->household_id =session('id') ;
        $house_change->now = $data['now-fw'];
        $house_change->want = $data['change-fw'];
        $house_change->explain = $data['shuoming'];
        $house_change->to_examine = 0;
        $house_change->save();
        return  redirect()->route('weixin_success');
    }
}
