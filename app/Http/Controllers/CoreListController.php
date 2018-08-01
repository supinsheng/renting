<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CelueRequest;
use App\Model\Celue;
use App\Model\Message;
use DB;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;

class CoreListController extends Controller
{
    //
    
    //===============
    function celue_list(){
        $data = Celue::get();
        return view('core.celue',[
            'data'=>$data
        ]);
    }
    public function add_celue(CelueRequest $req){
        // return $req->all();
        if($req->username){
            $celue = new Celue;
            $celue = $celue->fill($req->all());
            $celue->is_release = '1';
            $celue->save();
            
        }else{
            $celue = Celue::create($req->all());
        }
        return back()->with('success','策略已经定制成功！');;
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

    function send(){
        $villages = DB::table('villages')->select('id','name')->get();
        // return $villages;
        
// $test = " dfadad 论责民与三英的关系775fd   ";  
//         $test = preg_replace('/^( |\s)*|( |\s)*$/', '', $test);
//         for()
        return view('core.send',[
            'villages'=>$villages
        ]);
    }
    function doSend(CelueRequest $req){
        Message::create($req->all());
        return redirect()->route('send_message')->with('success','信息已经发布成功！');
    }


    function household_list(){
        
        $data = DB::table('households')->get();
        return view('core.household',[
            'data'=>$data
        ]);
    }
    function ajax_houselhold(Request $req){
        return DB::table('households')
                    ->leftJoin('properties','households.username','=','properties.username')
                    ->select('households.id','households.username','households.realname','village',DB::raw('(water_rent+power_rate+rent+property_fee+other_expenses) as moneys'),'is_pay','data','address')
                    ->where('households.id',$req->id)
                    ->get();
    }

    function urgePay(){
        // select datediff(`data`,now()) as days from jn_properties where now() < `data`;
        $data = DB::table('properties')
                    ->leftJoin('households','households.username','properties.username')
                    ->select('properties.username','phone','data','is_pay',DB::raw('datediff(`data`,now()) as days'))
                    ->where([
                        ['data','>',DB::raw('now()')],
                        ['is_pay','0']
                    ])->get();
        return view('core.urge',[
            'data'=>$data
        ]);



    }


    public  function sendSms(Request $req) {
        $config = [
            'accessKeyId'    => 'LTAIZHa2BPopnEcF',
            'accessKeySecret' => 'smFrrx0an8tV5jvLp1sOWfMcZ8Lg1e',
        ];
        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers($req->mobile);
        $sendSms->setSignName('建宁县公租房管理平台');
        $sendSms->setTemplateCode('SMS_135430007');
        $sendSms->setTemplateParam(['code' => rand(100000, 999999)]);
        $sendSms->setOutId('demo');

        $client->execute($sendSms);
    }
    
}
