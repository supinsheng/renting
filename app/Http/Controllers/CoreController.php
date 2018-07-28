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
        $m = 7;
        $time = strtotime($end) - 3600*24*30*$m;
        $start = date('Y-m-d',$time); 
        // return [$a,$time];
        // $data = House::select('UNIX_TIMESTAMP')where('start_time','like','2018%')->get();
        // $data = House::whereBetween('start_time',['2018-05-01','2018-09-23'])
        //                 ->groupBy('month')
        //                 ->get();
        // $data = House::select('month',DB::raw('count(*) as num'))
        // ->whereBetween('start_time',[$start,$end])
        // ->groupBy('month')->get();
        $data = DB::table('households')->whereBetween('start',[$start,$end])->get();
        $datas = json_encode($data);

        $total_chuzu = DB::table('households')->count();
        $villages = DB::table('villages')->select('id','name')->get();
        //获取发布策略
        // $celues = DB::table('celues')
        // ->where('is_release',1)->orderBy('updated_ar','desc')->get();
        // return $datas;
        return view('core.main',[
            'date'=>$date,
            'data'=>$datas,
            'total_chuzu'=>$total_chuzu,
            'villages'=>$villages,
            'start'=>$start,
            'end'=>$end,
            // 'celues'=>$celues
        ]);
    }
}
