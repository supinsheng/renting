<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Household;
use App\Model\Admin;
use App\Model\Village;

class AdminController extends Controller
{
    public function admin_login(){
        return view('admin.login');
    }

    public function admin_doLogin(Request $req){
        $admin = Admin::where('name',$req->name)->first();

        if($admin){
            if($admin->passwd == $req->passwd){
                session([
	
                    'name'=>$admin->name,
                ]);
                return redirect()->route('admin_index');
            }else {
                return back()->withInput()->withErrors(['passwd'=>'密码错误']);
            }
        }else {
            return back()->withInput()->withErrors(['name'=>'用户名不存在']);
        }
    }

    public function admin_logout(){
        session()->flush();

    	return redirect()->route('admin_login');
    }

    public function index(){
        if(!session('name')){
            return back();
        }else {
            return view('admin.index');
        }
    }

    public function indexTop(){
        return view('admin.top');
    }

    public function indexLeft(){
        return view('admin.left');
    }

    public function indexSwich(){
        return view('admin.swich');
    }

    public function indexMain(Request $req){
        
        if($req->keyword){
            
            $household = Household::where(function($q) use($req){

                $q->where('realname','like',"%$req->keyword%")
                  ->orWhere('address','like',"%$req->keyword%")
                  ->orWhere('village','like',"%$req->keyword%")
                  ->orWhere('phone','like',"%$req->keyword%");
            })->orderBy('id','desc')->paginate(15);
        }else {
            $household = Household::orderBy('id','desc')->paginate(15);
        }
        
        return view('admin.main',['household'=>$household,'req'=>$req]);
    }

    public function indexBottom(){
        return view ('admin.bottom');
    }

    // 删除住户
    public function delHousehold($id){

        $household = Household::find($id);
        $household->delete();
        return redirect()->route('indexMain');
    }

    // 录入住户
    public function addHousehold(){

        $village = Village::get();

        return view('admin.main_add',['village'=>$village]);
    }

    // 执行录入
    public function doaddHold(Request $req){

        $household = new Household;
        $household->fill($req->all());
        $household->save();
        return redirect()->route('indexMain');    
    }

    // 编辑住户
    public function editHousehold($id){

        $household = Household::find($id);

        $village = Village::get();

        return view('admin.main_edit',['household'=>$household,'village'=>$village]);
    }

    // 执行编辑
    public function doeditHold(Request $req,$id){
        
        $household = Household::find($id);

        $household->fill($req->all());
        $household->save();
        return redirect()->route('indexMain');
    }

    // 小区管理开始
    // 小区管理
    public function village(Request $req){

        if($req->keyword){
            
            $village = Village::where(function($q) use($req){

                $q->where('name','like',"%$req->keyword%");
            })->orderBy('id','desc')->get();
        }else {
            $village = Village::orderBy('id','desc')->get();
        }

        return view('admin.village',['village'=>$village]);
    }

    // 删除小区
    public function delVillage($id){

        $village = Village::find($id);
        $village->delete();

        return back();
    }

    // 编辑小区
    public function editVillage($id){

        $village = Village::find($id);

        return view('admin.village_edit',['village'=>$village]);
        
    }

    // 执行编辑
    public function doeditVillage(Request $req,$id){
        
        $village = Village::find($id);
        
        $village->fill($req->all());
        
        $village->save();
        
        return redirect()->route('village');
    }

    // 新增小区
    public function addVillage(){

        return view('admin.village_add');
    }

    // 执行新增
    public function doaddVillage(Request $req){

        $village = new Village;
        $village->fill($req->all());

        $village->save();

        return redirect()->route('village');
    }
    // 小区管理结束
}
