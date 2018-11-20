<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if($req->keyword)
        {
            $data = DB::table("guarantees")->where(function($q) use($req){

                $q->where('username','like',"%$req->keyword%")
                  ->orWhere('address','like',"%$req->keyword%")
                  ->orWhere('realname','like',"%$req->keyword%")
                  ->orWhere('device_name','like',"%$req->keyword%")
                  ->orWhere('describe','like',"%$req->keyword%")
                  ->orWhere('state','like',"%$req->keyword%");
            })->orderBy('id','desc')
            ->paginate(15);
        }
        else
        {
            $data = DB::table("guarantees")
            ->orderBy('id','desc')
            ->paginate(20);
        }
       

        return view('admin.repair',[
            'data' => $data,
            'req' => $req
        ]);
    }

    public function edit(Request $req)
    {
        $model = DB::table('guarantees')->where('id',$req->id);
        if($req->state=='yes')
        {
            $model->update(['state'=>"审核成功"]);
        }
        else
        {
            $model->update(['state'=>'审核失败']);
        }
        return back();
    }
}
