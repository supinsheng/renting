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
    function index(Request $req) {
        $db =  DB::table('households')
                    ->select('households.id','username','realname',
                    'rent.money as rent','rent.state as rent_state',
                    'water.money as water','water.state as water_state',
                    'property.money as prop','property.state as prop_state',
                    'electric.money as elec','electric.state as elec_state')
                    ->leftJoin('rent',function($join) {
                        $join->on('households.id','=','rent.user_id')
                                ->where('rent.date','=',date('Y-m'));
                    })->leftJoin('water',function($join) {
                        $join->on('households.id','=','water.user_id')
                                ->where('water.date','=',date('Y-m'));
                    })->leftJoin('property',function($join) {
                        $join->on('households.id','=','property.user_id')
                                ->where('property.date','=',date('Y-m'));
                    })->leftJoin('electric',function($join) {
                        $join->on('households.id','=','electric.user_id')
                                ->where('electric.date','=',date('Y-m'));
                    });
        if($req->keyword) {
            $db = $db->where(function($q) use($req){
                            $q->where('households.id','like',"%$req->keyword%")
                                ->orWhere('username','like',"%$req->keyword%")
                                ->orWhere('realname','like',"%$req->keyword%");
                        });
        } 
        // 排除用户名注销的住户
        $data = $db->where('address','!=','')
                   ->orderBy('households.id','desc')->paginate(15);
        
        return view('admin.household.pay',[
            'data' => $data,
            'req' => $req,
            'date' => date('Y-m')
        ]);
    }

    function add(Request $req) {
        $req->validate([
            'id' => 'required',
            'price' => 'required',
            'type' => 'required'
        ],[
            'id.required' => '未知用户，请重新操作',
            'price.required' => '金额不能为空',
            'type.required' => '缴费类型不能为空'
        ]);
        $date = date("Y-m");
        // 先查询数据库，来判断是否重复添加了
        $costs = DB::table($req->type)
                    ->where('user_id','=',$req->id)
                    ->where('date','=',$date)
                    ->first();
        // 判断记录是否已经存在
        if(!$costs) {
            DB::table($req->type)->insert([
                'user_id' => $req->id,
                'money' => $req->price,
                'date' => date('Y-m')
            ]);
        }
       
        return back();
    }
    function edit(Request $req) {
        $req->validate([
            'id' => 'required',
            'price' => 'required',
            'type' => 'required'
        ],[
            'id.required' => '未知用户，请重新操作',
            'price.required' => '金额不能为空',
            'type.required' => '缴费类型不能为空'
        ]);
        // 更改数据
        DB::table($req->type)->where('user_id','=',$req->id)->update(['money'=>$req->price]);
        return back();
    }
}
