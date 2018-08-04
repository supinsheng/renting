<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Household;
use App\Model\Propertie;
use DB;
class HouseholdController extends Controller
{
    function list (Request $req) {
        // $data = Household::get();
        if($req->keyword){
            
            $household = Household::leftJoin('properties','households.username','=','properties.username')
            ->select('households.*','water_rent','power_rate','rent')
            ->where(function($q) use($req){

                $q->where('households.id','like',"%$req->keyword%")
                  ->orWhere('address','like',"%$req->keyword%")
                  ->orWhere('phone','like',"%$req->keyword%")
                  ->orWhere('village','like',"%$req->keyword%")
                  ->orWhere('start','like',"%$req->keyword%")
                  ->orWhere('households.realname','like',"%$req->keyword%");
                //   ->orWhere('end_time','like',"%$req->keyword%");
            })->orderBy('id','desc')->paginate(15);
        }else {
            $household = Household::leftJoin('properties','households.username','=','properties.username')
            ->select('households.*','water_rent','power_rate','rent')
            ->orderBy('id','desc')
            ->paginate(15);
        }
        // return $household;
        return view('admin.household.list',[
            'household'=>$household,
            'req'=>$req
        ]);
    }
    //房屋出租记录查询、
    function houseSelect (Request $req) {
        // $data = Household::get();
        if($req->keyword){
            
            $house = Household::where(function($q) use($req){

                $q->where('id','like',"%$req->keyword%")
                  ->orWhere('address','like',"%$req->keyword%")
                  ->orWhere('username','like',"%$req->keyword%")
                  ->orWhere('phone','like',"%$req->keyword%")
                  ->orWhere('village','like',"%$req->keyword%")
                  ->orWhere('start','like',"%$req->keyword%")
                  ->orWhere('realname','like',"%$req->keyword%");
                //   ->orWhere('end_time','like',"%$req->keyword%");
            })->orderBy('id','desc')->paginate(15);
        }else {
            $house = Household::orderBy('id','desc')
            ->paginate(15);
        }
        // return $household;
        return view('admin.household.house',[
            'house'=>$house,
            'req'=>$req
        ]);
    }
    //收费管理
    function payment(Request $req) {
        if($req->keyword){
            
            $data = DB::table('properties')
            ->where(function($q) use($req){

                $q->where('id','like',"%$req->keyword%")
                  ->orWhere('username','like',"%$req->keyword%")
                  ->orWhere('realname','like',"%$req->keyword%");
            })->where('is_pay','0')
            ->orderBy('id','desc')->paginate(15);
        }else {
            $data = DB::table('properties')->where('is_pay','0')->orderBy('id','desc')
            ->paginate(15);
        }
        // return $data;
        return view('admin.household.pay',[
            'data'=>$data,
            'req'=>$req
        ]);
    }

    function doPayment(Request $req) {
        $data = Propertie::where('id',$req->id)->first();
        $name = $req->name;
        $data->$name = $req->price;
        $data->save();
        return back();
        // $data->($req->name)
    }
}
