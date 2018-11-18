<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;
class WxpayController extends Controller
{
    protected $config = [
        'app_id' => 'wx426b3015555a46be', // 公众号 APPID
        'mch_id' => '1900009851',
        'key' => '8934e7d15453e97507ef794cf7b0519d',
        // 通知的地址
        'notify_url' => 'http://b7c2f34f.ngrok.io/wxpay/notify',
    ];

    public function index(Request $req)
    {
        $order = [
            'out_trade_no' => time(),
            'total_fee' => '1', // **单位：分**
            'body' => 'test body - 测试',
        ];
        // wap H5支付
        $pay = Pay::wechat($this->config)->wap($order);

        echo $pay->return_code , '<hr>';
        echo $pay->return_msg , '<hr>';
        echo $pay->appid , '<hr>';
        echo $pay->result_code , '<hr>';
        echo $pay->code_url , '<hr>';
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
