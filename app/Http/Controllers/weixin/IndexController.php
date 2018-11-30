<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\House;
use App\Model\Rent;
use App\Model\Water;
use App\Model\Electric;
use App\Model\Property;
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
            $rent =  Rent::select('money')
            ->where('id',session('id'))
            ->where('date', date('Y-m'))
            ->first();
            $elec = Electric::select('money')
            ->where('id',session('id'))
            ->where('date', date('Y-m'))
            ->first();
            $prop = Property::select('money')
            ->where('id',session('id'))
            ->where('date', date('Y-m'))
            ->first();
            return view('Weixin.index',[
                'ishouse'=>$ishouse,
                'rent' => isset($rent->moeny)?$rent->money:'0.00',
                'elec' => isset($elec->money)?$elec->money:'0.00',
                'prop' => isset($prop->money)?$prop->moeny:'0.00',
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
    // 房型展示
    public function fanxinzhanshi(){
        return view('Weixin.fanxinzhanshi');
    }
    public function fanxinzhanshi1(){
        return view('Weixin.fanxinzhanshi1');
    }
}
