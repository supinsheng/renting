<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Household;
use App\Http\Requests\weixin\LoginRequest;

class LoginController extends Controller
{
    public  function  login(){
        return view('Weixin.login');
    }
    public  function  dologin(LoginRequest $req){
        // 先通过手机号到数据库中查询用户的信息
        $household = Household::where('username',$req->username)->first();
        // 判断是否有这个账号
        if($household)
        {
            if($req->isagree!='on'){
                return back()->withErrors('请先同意建宁县公租房微信平台协议');
            }
            // 判断密码
            // 表单中的密码：$req->password   （原始）
            // 数据库的密码：$user->password （哈希之后 ）
            // laravel中 Hash::check(原始，哈希之后)判断是否一致
            if( $req->password   ==   $household->password   )
            {
                // 把用户常用的数据保存到SESSION（标记一下、打卡）
                session([
                    'id' => $household->id,
                    'username' => $household->username,
                    'realname' => $household->realname,
                    'phone' => $household->phone,
                    'cardId' => $household->cardId,
                    'village' => $household->village,
                    'address' => $household->address,
                    'balance' => $household->balance //保存住户的余额，任何关于余额的操作都需要更新session
                ]);
                // 跳转
                return redirect()->route('weixin_index');
            }
            else
            {
                // 密码错误
                return back()->withErrors('密码错误！');
            }
        }
        else
        {
            // 账号不存在
            // 返回上一个页面，并把错误信保存到SESSION中，返回，在下一个页面中就可以使用 $errors 获取这个错误信息了
            return back()->withErrors('账户不存在！');
        }
    }
}
