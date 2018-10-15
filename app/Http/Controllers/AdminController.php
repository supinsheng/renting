<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Household;
use App\Model\Admin;
use App\Model\Village;
use App\Model\House;
use App\Http\Requests\HouseholdRequest;
use DB;
class AdminController extends Controller
{
    public function admin_login(){
        return view('admin.login');
    }

    public function admin_doLogin(Request $req){
        $admin = Admin::where('name',$req->name)->first();
        $jurs = DB::table('jurisdics')->get();
        $dic = '';
        for($i=0;$i<count($jurs);$i++){
            if($jurs[$i]->id  == $admin->jurisdiction){
                $dic = $jurs[$i]->jurisdiction;
            }
        }
        if($admin){
            if($admin->passwd == $req->passwd){
                session([
	
                    'name'=>$admin->name,
                    'jurisdiction'=>$dic,
                    'adminId'=>$admin->id
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
        $type_id = DB::table('cost_types')->select('id')->where('type_name','房租')->get();
        echo $type_id;
        return  ;
        // if($req->keyword){
            
        //     $household = Household::select('Households.*','houses.house_area','houses.rent')
        //     ->leftJoin('houses', 'households.address','houses.house_id')
        //     ->where(function($q) use($req){

        //         $q->where('realname','like',"%$req->keyword%")
        //           ->orWhere('address','like',"%$req->keyword%")
        //           ->orWhere('village','like',"%$req->keyword%")
        //           ->orWhere('phone','like',"%$req->keyword%")
        //           ->orWhere('cardId','like',"%$req->keyword%")
        //           ->orWhere('time','like',"%$req->keyword%")
        //           ->orWhere('start','like',"%$req->keyword%");
        //     })->orderBy('id','desc')->paginate(15);
        // }else {
        //     $household =  Household::select('Households.*','houses.house_area','houses.rent')
        //     ->leftJoin('heouses', 'households.address','houses.house_id')
        //     ->orderBy('id','desc')->paginate(15);
        // }
        // return view('admin.main',['household'=>$household,'req'=>$req]);
    }

    public function indexBottom(){
        return view ('admin.bottom');
    }

    // 删除住户
    public function delHousehold($id){

        $household = Household::find($id);
        $house = House::where('house_id',$household->address)->first();
        if($house){

            $house->state = '未出租';
            $house->hold_name = '';
            $house->hold_phone = '';
            $house->start_time = '';
            $house->end_time = '';
            $house->residual_lease = '';
            $house->save();
        }
        $household->delete();
        return redirect()->route('indexMain');
    }

    // 录入住户
    public function addHousehold(){

        $village = Village::get();

        return view('admin.main_add',['village'=>$village]);
    }

    // 执行录入
    public function doaddHold(HouseholdRequest $req){
        
        $house = House::where('house_id',$req->address)->where('village',$req->village)->first();
                
        if($house){
            
            $household = new Household;
            $household->fill($req->all());
            $household->time = $req->time;
            $household->end = date("Y-m-d", strtotime("+".$req->time." months", strtotime("".$req->start."")));
            $household->save();

            $house->state = '已出租';
            $house->hold_name = $req->realname;
            $house->hold_phone = $req->phone;
            $house->start_time = $req->start;
            $house->end_time = date("Y-m-d", strtotime("+".$req->time." months", strtotime("".$req->start."")));
            if(strtotime('now')<strtotime($req->start)){
                $house->residual_lease = $req->time;
                
            }else {
                $house->residual_lease = floor((strtotime($household->end)-strtotime('now'))/(60*60*24)).'天';
            }
            $house->save();
            return redirect()->route('indexMain');
        }else {
            return back()->withInput()->withErrors(['address'=>'该房屋编号 不存在']);
        }
        
          
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
        $house = House::where('house_id',$household->address)->first();
        $house->state = '未出租';
        $house->hold_name = '';
        $house->hold_phone = '';
        $house->start_time = '';
        $house->end_time = '';
        $house->residual_lease = '';
        $house->save();

        $household->fill($req->all());
        $household->password = $req->password;
        $household->time = $req->time."个月";
        $household->end = date("Y-m-d", strtotime("+".$req->time." months", strtotime("".$req->start."")));
        $household->save();

        $house = House::where('house_id',$req->address)->where('village',$req->village)->first();
        $house->state = '已出租';
        $house->hold_name = $req->realname;
        $house->hold_phone = $req->phone;
        $house->start_time = $req->start;
        $house->end_time = date("Y-m-d", strtotime("+".$req->time." months", strtotime("".$req->start."")));
        if(strtotime('now')<strtotime($req->start)){
            $house->residual_lease = $req->time;
            
        }else {
            $house->residual_lease = floor((strtotime($household->end)-strtotime('now'))/(60*60*24)).'天';
        }
        $house->save();

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

            if($req->name==''){
                return back()->withInput()->withErrors(['error'=>'请输入小区名称！']);
            }else {
                $village = new Village;
                $village->fill($req->all());

                $village->save();

                return redirect()->route('village');
            }
   
            
    }
    // 小区管理结束
}
