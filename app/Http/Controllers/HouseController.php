<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\House;
use App\Model\Village;
use App\Model\Household;

class HouseController extends Controller
{
    // 房屋出租状态
    public function house(Request $req){

        if($req->keyword){
            
            $house = House::where(function($q) use($req){

                $q->where('house_id','like',"%$req->keyword%")
                  ->orWhere('state','like',"%$req->keyword%")
                  ->orWhere('hold_name','like',"%$req->keyword%")
                  ->orWhere('hold_phone','like',"%$req->keyword%")
                  ->orWhere('residual_lease','like',"%$req->keyword%")
                  ->orWhere('start_time','like',"%$req->keyword%")
                  ->orWhere('village','like',"%$req->keyword%")
                  ->orWhere('end_time','like',"%$req->keyword%");
            })->orderBy('state','asc')->orderBy('id','desc')->paginate(15);
        }else {
            $house = House::orderBy('state','asc')->orderBy('id','desc')->paginate(15);
        }

        return view('admin.house.house',['house'=>$house,'req'=>$req]);
    }

    // 新增房屋
    public function add_house(){

        $village = Village::get();

        return view('admin.house.house_add',['village'=>$village]);
    }

    // 执行新增
    public function doAdd_house(Request $req){
        
        if($req->house_id=='' || $req->village==''){
            return back()->withInput()->withErrors(['error'=>'输入数据不完整！']);
            
        }else {
            if(House::where('house_id',$req->house_id)->count()){
                return back()->withInput()->withErrors(['error'=>'房屋编号已存在，新增失败']);
            }else{
                $house = new House;
                $house->fill($req->all());

                $house->save();

                return redirect()->route('house');
            }
            
        } 
    } 
    
    // 删除房屋
    public function del_house($id){

        $house = House::find($id);
        $house->delete();

        $household = Household::where('address',$house->house_id)->first();
        if($household){
            $household->delete();
        }

        return back();
    }
}