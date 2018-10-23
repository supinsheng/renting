<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Agreement;
class HtController extends Controller
{
    public  function htlb(){
        $data = DB::table('agreements')
            ->orderBy('updated_at','desc')
            ->get();
            return view("Weixin.ht_list",[
                'data'=>$data
            ]);
    }
    public  function htxq($id){
        $data = Agreement::where('id',$id)->get();
        return view("Weixin.ht_miaoshu",[
            "data"=>$data
        ]);
    }
}
