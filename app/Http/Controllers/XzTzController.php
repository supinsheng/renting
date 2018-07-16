<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Xuzu;
use App\Model\Village;
use App\Model\Household;
use App\Model\Tuizu;

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
    // 退租
    public function tuizu(Request $req){

        if($req->keyword){
            
            $tuizu = Tuizu::where(function($q) use($req){

                $q->where('realname','like',"%$req->keyword%")
                  ->orWhere('address','like',"%$req->keyword%")
                  ->orWhere('village','like',"%$req->keyword%")
                  ->orWhere('phone','like',"%$req->keyword%")
                  ->orWhere('cardId','like',"%$req->keyword%")
                  ->orWhere('tuizu_cause','like',"%$req->keyword%")
                  ->orWhere('state','like',"%$req->keyword%");
            })->orderBy('id','desc')->paginate(15);
        }else {
            $tuizu = Tuizu::orderBy('id','desc')->paginate(15);
        }
        
        return view('admin.tuizu.tuizu',['tuizu'=>$tuizu,'req'=>$req]);
    }

    // 删除退租
    public function del_tuizu($id){

        $tuizu = Tuizu::find($id);
        $tuizu->delete();
        return back();
    }

    // 编辑续租
    public function edit_tuizu($id){

        $tuizu = Tuizu::find($id);
        $village = Village::get();

        return view('admin.tuizu.tuizu_edit',['tuizu'=>$tuizu,'village'=>$village]);
    }
    // 执行编辑
    public function doeditTuizu(Request $req,$id){
        
        $tuizu = Tuizu::find($id);

        $tuizu->fill($req->all());
        $tuizu->flow_number = date("Ymdhis");

        $tuizu->save();
        return redirect()->route('tuizu');
    }

    // 添加退租
    public function add_tuizu(){

        $village = Village::get();

        return view('admin.tuizu.tuizu_add',['village'=>$village]);
    }
    // 执行添加
    public function doAdd_tuizu(Request $req){

        if($req->realname=='' || $req->phone=='' || $req->cardId=='' || $req->address==''){
            return back()->withInput()->withErrors(['error'=>'填入的数据不完整，请重新输入']);
        }else {
            $tuizu = new Tuizu;
            $tuizu->fill($req->all());
            $tuizu->flow_number = date("Ymdhis");

            $tuizu->save();
            return redirect()->route('tuizu');
        }    
    }

    // 退租审核通过
    public function tzStateY($id){

        $tuizu = Tuizu::find($id);
        $tuizu->state = '审核通过';
        $tuizu->save();

        $household = HouseHold::where(['realname'=>$tuizu->realname,'cardId'=>$tuizu->cardId])
                                ->first();

        if($household){
            $household->delete();
        }
        
        return redirect()->route('tuizu');
    }

    // 退租审核不通过
    public function tzStateN($id){

        $tuizu = Tuizu::find($id);
        $tuizu->state = '审核不通过';
        $tuizu->save();
        return redirect()->route('tuizu');
    }

    // 退租结束
}
