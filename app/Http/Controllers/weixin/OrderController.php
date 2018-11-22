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
        $rent = Rent::where([
            ['user_id','=', session('id')],
            ['state','=','0']
        ])->first();
        $water = Water::where([
            ['user_id','=', session('id')],
            ['state','=','0']
        ])->first();
        $elec = Electric::where([
            ['user_id','=', session('id')],
            ['state','=','0']
        ])->first();
        $prop = Property::where([
            ['user_id','=', session('id')],
            ['state','=','0']
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
        $order = Order::where('user_id',session('id'))
        ->whereDate('created_at',date('Y-m-d'))
        ->first();
        if($order != '' && $order->state=='1')
        {
            return redirect('/order/success');
        }
        // $name = '';
        // if($req->type == 'rent')
        //     $name = '房租';
        // elseif($req->type == 'water')
        //     $name = '水费';
        // elseif($req->type == 'electric')
        $data = DB::table($req->type)->where('user_id',session('id'))->first();
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

}
