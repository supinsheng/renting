<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Model\Admin;
use DB;
use App\Http\Requests\AdminRequest;
class JurController extends Controller
{
    public function list(Request $req){
        if($req->keyword){
            $data = Admin::leftJoin('jurisdics','admins.jurisdiction','=','jurisdics.id')
            ->select('admins.*','jurisdics.jurisdiction')
            ->where(function($q) use($req){

                $q->where('admins.id','like',"%$req->keyword%")
                ->orWhere('admins.name','like',"%$req->keyword%")
                ->orWhere('jurisdics.jurisdiction','like',"%$req->keyword%");
            })->orderBy('id','desc')->get();
        }else{
            $data = Admin::leftJoin('jurisdics','admins.jurisdiction','=','jurisdics.id')
                    ->select('admins.*','jurisdics.jurisdiction')
                    ->orderBy('id','desc')->get();
        }
        // return $data;
        $jurs = DB::table('jurisdics')->get();
        // return $users;
        return view('admin.jurisdiction',[
            'data'=>$data,
            'jurs'=>$jurs
        ]);
    }
    public function edit(AdminRequest $req){
        $data = Admin::where('id',$req->id)->first();
        $data->fill($req->all());
        $data->save();
        return back()->with('success','操作员数据修改成功！');
    }
    function add(AdminRequest $req){
        Admin::create($req->all());
        return back()->with('success','操作员添加成功！');
    }

    function del($id){
        Admin::where('id',$id)->delete();
        return back()->with('success','该操作员删除成功');
    }

    function jurisList(Request $req){
        $data = DB::table('jurisdics')
        ->where(function($q) use($req){

            $q->where('id','like',"%$req->keyword%")
            ->orWhere('jurisdiction','like',"%$req->keyword%");
        })
        ->get();
        return view('admin.editJurs',[
            'jurs'=>$data
        ]);
    }
    function addJuris(Request $req){
        DB::table('jurisdics')->insert(['jurisdiction'=>$req->jurisdiction]);
        return back()->with('success','权限添加成功');
    }
    function delJuris($id){
        DB::table('jurisdics')->where('id',$id)->delete();
        return back()->with('success','该权限删除成功');
    }
}
