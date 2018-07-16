<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Xuzu;
use App\Model\Village;
use App\Model\Household;

class XzTzController extends Controller
{
    //续租
    public function xuzu(Request $req){

        if($req->keyword){
            
            $xuzu = Xuzu::where(function($q) use($req){

                $q->where('realname','like',"%$req->keyword%")
                  ->orWhere('address','like',"%$req->keyword%")
                  ->orWhere('village','like',"%$req->keyword%")
                  ->orWhere('phone','like',"%$req->keyword%")
                  ->orWhere('cardId','like',"%$req->keyword%")
                  ->orWhere('time','like',"%$req->keyword%")
                  ->orWhere('state','like',"%$req->keyword%");
            })->orderBy('id','desc')->paginate(15);
        }else {
            $xuzu = Xuzu::orderBy('id','desc')->paginate(15);
        }
        
        return view('admin.xuzu.xuzu',['xuzu'=>$xuzu,'req'=>$req]);
    }

    // 续租审核通过
    public function xzStateY($id){

        $xuzu = Xuzu::find($id);
        $xuzu->state = '审核通过';
        $xuzu->save();

        $household = HouseHold::where(['realname'=>$xuzu->realname,'cardId'=>$xuzu->cardId])
                                ->first();

        if($household){
            $household->time = ($household->time)*1 + ($xuzu->time)*1;
            
            $household->save();
        }
        
        return redirect()->route('xuzu');
    }

    // 续租审核不通过
    public function xzStateN($id){

        $xuzu = Xuzu::find($id);
        $xuzu->state = '审核不通过';
        $xuzu->save();
        return redirect()->route('xuzu');
    }

    // 删除续租
    public function del_xuzu($id){

        $xuzu = Xuzu::find($id);
        $xuzu->delete();
        return back();
    }

    // 编辑续租
    public function edit_xuzu($id){

        $xuzu = Xuzu::find($id);
        $village = Village::get();

        return view('admin.xuzu.xuzu_edit',['xuzu'=>$xuzu,'village'=>$village]);
    }
    // 执行编辑
    public function doeditXuzu(Request $req,$id){
        
        $xuzu = Xuzu::find($id);

        $xuzu->fill($req->all());
        $xuzu->flow_number = date("Ymdhis");

        $xuzu->save();
        return redirect()->route('xuzu');
    }

    // 添加续租
    public function add_xuzu(){

        $village = Village::get();

        return view('admin.xuzu.xuzu_add',['village'=>$village]);
    }
    // 执行添加
    public function doAdd_xuzu(Request $req){

        if($req->realname=='' || $req->phone=='' || $req->cardId=='' || $req->address==''){
            return back()->withInput()->withErrors(['error'=>'填入的数据不完整，请重新输入']);
        }else {
            $xuzu = new Xuzu;
            $xuzu->fill($req->all());
            $xuzu->flow_number = date("Ymdhis");

            $xuzu->save();
            return redirect()->route('xuzu');
        }    
    }

    // 退租开始
    //续租
    public function tuizu(Request $req){

        if($req->keyword){
            
            $tuizu = Tuizu::where(function($q) use($req){

                $q->where('realname','like',"%$req->keyword%")
                  ->orWhere('address','like',"%$req->keyword%")
                  ->orWhere('village','like',"%$req->keyword%")
                  ->orWhere('phone','like',"%$req->keyword%")
                  ->orWhere('cardId','like',"%$req->keyword%")
                  ->orWhere('state','like',"%$req->keyword%");
            })->orderBy('id','desc')->paginate(15);
        }else {
            $tuizu = Tuizu::orderBy('id','desc')->paginate(15);
        }
        
        return view('admin.xuzu.xuzu',['xuzu'=>$xuzu,'req'=>$req]);
    }
    // 退租结束
}
