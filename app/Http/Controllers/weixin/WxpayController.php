<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;
class WxpayController extends Controller
{
    protected $config = [
        'app_id' => 'wx4cbc0a5a5e78d748', // 公众号 APPID
        'mch_id' => '1511187271',
        'key' => '08839714a18fb0130a35ca9073810d2b',
        // 通知的地址
        'notify_url' => 'http://jngzf.cn/notify',
            
    ];

    public function pay(Request $req)
    {
        if($_SERVER['REMOTE_ADDR'])
        {
            $cip = $_SERVER['REMOTE_ADDR'];
        }
        elseif(getenv("REMOTE_ADDR"))
        {
            $cip = getenv('REMOTE_ADDR');
        }
        // return $cip;
        $order = [
            'out_trade_no' => time(),
            'total_fee' => '1', // **单位：分**
            'body' => 'test body - 测试',
        ];
        // wap H5支付
        $pay = Pay::wechat($this->config)->wap($order);
        // return $wechat->wap($order);
        // echo $pay->return_code , '<hr>';
        // echo $pay->return_msg , '<hr>';
        // echo $pay->appid , '<hr>';
        // echo $pay->result_code , '<hr>';
        // echo $pay->code_url , '<hr>';
        return $pay;
    }

    public function notify()
    {
        $pay = Pay::wechat($this->config);

        try{
            $data = $pay->verify(); // 是的，验签就这么简单！

            Log::debug('Wechat notify', $data->all());
        } catch (Exception $e) {
            // $e->getMessage();
        }
        
        return $pay->success()->send();// laravel 框架中请直接 `return $pay->success()`
    }
}
