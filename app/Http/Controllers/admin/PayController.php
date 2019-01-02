<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Household;
use App\Model\Rent;
use App\Model\Water;
use App\Model\Electric;
use App\Model\Property;
use DB;
class PayController extends Controller
{
    //收费管理
    function index() {
        // 获取username不为空的住户（即排除退租的住户）
        $data = Household::select('id','username','realname')
                        ->where('username','!=','')
                        ->where('address','!=','')
                        ->get();
        $arr = [];
        foreach($data as $v)
        {
            $rent = Rent::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $water= Water::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $property = Property::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $electric = Electric::where('date','=',date('Y-m'))
            ->where('user_id','=',$v['id'])
            ->first();

            $arr[] = [
                'id' => $v['id'],
                'rent' => $rent['money'],
                'rent_state' => $rent['state'],
                'water' => $water['money'],
                'water_state' => $water['state'],
                'property' => $property['money'],
                'property_state' => $property['state'],
                'electric' => $electric['money'],
                'electric_state' => $electric['state'],
                'realname' => $v['realname'],
                'username' => $v['username'],
                'date' => date('Y-m'),
            ]; 

        }

        // return $data;
        return view('admin.household.pay',[
            'data' => $arr
        ]);
    }

    function add(Request $req) {
        // $data = Propertie::where('id',$req->id)->first();
        // $name = $req->name;
        // $data->$name = $req->price;
        // $data->save();
        // return back();
        // $data->($req->name)
        DB::table($req->type)->insert([
            'user_id' => $req->id,
            'money' => $req->price,
            'date' => date('Y-m')
        ]);
        return back();
    }
    function edit(Request $req) {
        // 更改数据
        DB::table($req->type)->where('user_id','=',$req->id)->update(['money'=>$req->price]);
        return back();
    }
}
