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
        'notify_url' => 'http://54f76e07.ngrok.io/notify',
        'spbill_create_ip' => '',
            
    ];

    public function pay(Request $req)
    {
        // return $req->all();
        $this->config['spbill_create_ip'] = $req->cip;
        $wechat = Pay::wechat($this->config);
        // return $wechat->spbill_create_ip;
        $order = [
            'out_trade_no' => time(),
            'total_fee' => '1', // **单位：分**
            'body' => 'test body - 测试',
        ];
        // wap H5支付
        return $wechat->wap($order);
        // return $wechat->wap($order);
        // echo $pay->return_code , '<hr>';
        // echo $pay->return_msg , '<hr>';
        // echo $pay->appid , '<hr>';
        // echo $pay->result_code , '<hr>';
        // echo $pay->code_url , '<hr>';

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
