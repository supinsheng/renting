<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CelueRequest;
use App\Model\Celue;
class CoreListController extends Controller
{
    //
    function celue_list(){
        $data = Celue::get();
        return view('core.celue',[
            'data'=>$data
        ]);
    }
    public function add_celue(CelueRequest $req){
        $celue = Celue::create($req->all());
        return redirect()->route('cl_list');
    }
    public function edit_celue(CelueRequest $req){
        // $celue = Celue::find($req->id);
        $celue = Celue::where('id',$req->id)->first();
        $celue = $celue->fill($req->all());
        $celue->save();
        return back();
    }   
    public function del($id){
        Celue::where('id',$id)->delete();
        return back();
    }
    function release(Request $req){
        $celue = Celue::where('id',$req->id)->first();
        $celue->is_release = '1';
        // return $celue;
        $celue->save();
        return back();
    }
}
