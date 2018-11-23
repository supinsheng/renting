<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Rent;
use App\Model\Water;
use App\Model\Electric;
use App\Model\Property;
use App\Model\Order;
use DB;
class OrderController extends Controller
{
    public function index()
    {
        $date = date('Y-m');
        $rent = Rent::where([
            ['user_id','=', session('id')],
            ['state','=','0'],
            ['date','=',$date],
        ])->first();
        $water = Water::where([
            ['user_id','=', session('id')],
            ['state','=','0'],
            ['date','=',$date],
        ])->first();
        $elec = Electric::where([
            ['user_id','=', session('id')],
            ['state','=','0'],
            ['date','=',$date],
        ])->first();
        $prop = Property::where([
            ['user_id','=', session('id')],
            ['state','=','0'],
            ['date','=',$date],
        ])->first();
        return view('Weixin.month',[
            'rent' => $rent,
            'water' => $water,
            'elec' => $elec,
            'prop' => $prop,
        ]);
    }
    public function create(Request $req)
    {
        // $name = '';
        // if($req->type == 'rent')
        //     $name = '房租';
        // elseif($req->type == 'water')
        //     $name = '水费';
        // elseif($req->type == 'electric')
        $data = DB::table($req->type)
        ->where([
            ['user_id',session('id')],
            ['date','=',date('Y-m')],
        ])
        ->first();
        $num = time().rand(1,99999);
        return view('Weixin.order',[
            'data' =>$data,
            'num' => $num,
            'name' => $req->type
        ]);
    }
    public function success()
    {
        return view('Weixin.success');
    }


    public function ajaxOrder(Request $req)
    {
        // return $req->type;
        // 通过表名，查询当前月的是否支付成功
        // return DB::table($req->type)->where([
        //     ['user_id','=',session('id')],
        //     ['date','=',date('Y-m')],
        // ])->get();
   
        // return DB::table('orders')->where('number',$req->num)->first();
        return Order::where('number',$req->num)->first();
    }  
    public function test(Request $req)
    {
        $req->code
    }
}
