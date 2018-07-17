<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tuizu;
use App\Model\Xuzu;

class InterfaceController extends Controller
{
    //用户续租接口
    public function PostXuzu(Request $req)
    {
        $data=json_decode($req->getContent(),TRUE);
        $xuzu = new Xuzu;
        $xuzu->realname = $data['name'];
        $xuzu->cardId = $data['id_card'];
        $xuzu->phone = $data['phone_num'];
        $xuzu->address = $data['user_add'];
        $xuzu->village = '建南小区';
        $xuzu->time = $data['xuzu_time'];
        $xuzu->state = '审核中';
        $xuzu->flow_number = date('YmdHis');
        if($xuzu->save()){
            $ret=[
                'errno'=>1,
                'errmsg'=>''
            ];
//            状态码
            $status=200;
            return response($ret);
        }else {
            $ret=[
                'errno'=>0,
                'errmsg'=>'申请失败'
            ];
//            状态码
            $status=201;
            return response($ret);
        }
//        var_dump($req);
//        $data= $req->getContent();
//        $data = json_encode($data);
//        $xuzu->save();
//        return $data['name'];
//        return  $xuzu->realname;

    }
    //用户退租接口
    public function  PostTuiZu(Request $req){
        $data=json_decode($req->getContent(),TRUE);
        $tuizu = new Tuizu;
        $tuizu->realname = $data['name'];
        $tuizu->cardId = $data['id_card'];
        $tuizu->phone = $data['phone_num'];
        $tuizu->address = $data['user_add'];
        $tuizu->village = '建南小区';
        $tuizu->state = '审核中';
        $tuizu->tuizu_cause = '审核中';
        $tuizu->flow_number = date('YmdHis');
        if($tuizu->save()){
            $ret=[
                'errno'=>1,
                'errmsg'=>''
            ];
//            状态码
            $status=200;
            return response($ret);
        }else {
            $ret=[
                'errno'=>0,
                'errmsg'=>'申请失败'
            ];
//            状态码
            $status=201;
            return response($ret);
        }
    }
    // 用户提交保修申请接口
    public  function PostBaoxiu(Request $req){

    }



}
