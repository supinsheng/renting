<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\House;

class IndexController extends Controller
{
    public function  index(){
            $user = House::where('hold_name',session('realname'))->first();
            $ishouse='';
            if($user){
                $ishouse='已入住';
            }else{
                $ishouse='未入住';
            }
            return view('Weixin.index',[
                'ishouse'=>$ishouse,
            ]);
    }
    // 地图
    public function ditu(){
        return view('Weixin.ditu');
    }
    // 小区一览
    public function xiaoqu(){
        return view('Weixin.xiaoquyilan');
    }
}
