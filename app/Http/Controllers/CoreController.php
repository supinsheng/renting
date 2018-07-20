<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CoreRequest;
// use App\Http\Requests\BlogRequest;
use App\Model\Core;
use Hash;
use App\Model\House;
use DB;
class CoreController extends Controller
{
    //

    function login(){
        $user = Core::where('name','=','aaa')->get();
        $pwd = Hash::make('123');
        return view('core.index',[
            'user'=>$user,
            'pwd'=>$pwd
        ]);
    }
    function doLogin(CoreRequest $req){
        $user = Core::where('name',$req->username)->first();
        if($user){
            if(Hash::check($req->password,$user->password)){
                session([
                    'id'=>$user->id
                    // 'face'=
                ]);
                return redirect()->route('cr_main');
            }else{
                return back()->withErrors(['password'=>'输入的密码错误']);
            }
        }
        else{
            return back()->withErrors(['username'=>'不存在该用户名']);
        }
    }
    function main(){
        $date = 1;
        $end = date("Y-m-d");
        $m = 6;
        $time = strtotime($end) - 3600*24*30*$m;
        $start = date('Y-m-d',$time); 
        // return [$a,$time];
        // $data = House::select('UNIX_TIMESTAMP')where('start_time','like','2018%')->get();
        // $data = House::whereBetween('start_time',['2018-05-01','2018-09-23'])
        //                 ->groupBy('month')
        //                 ->get();
        $data = House::select('month',DB::raw('count(*) as num'))
        ->whereBetween('start_time',[$start,$end])
        ->groupBy('month')->get();
        $datas = json_encode($data);
        // return $datas;
        return view('core.main',[
            'date'=>$date,
            'data'=>$datas
        ]);
    }
}
