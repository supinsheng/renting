<?php

namespace App\Http\Controllers\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;
use App\Model\Order;
use DB;
class WxpayController extends Controller
{
    protected $config = [
        'app_id' => 'wx4cbc0a5a5e78d748', // 公众号 APPID
        'mch_id' => '1511187271',
        'key' => '08839714a18fb0130a35ca9073810d2b',
        // 通知的地址
        'notify_url' => 'http://jngzf.cn/notify',
        // 'spbill_create_ip' => '',
            
    ];

    public function pay(Request $req)
    {
        $code = $req->code;

        // 获取openid

        $data = file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx4cbc0a5a5e78d748&secret=d60bdc7166ee84ec74a4407a4ea9e088&code=$code&grant_type=authorization_code");
        // $data = json_encode($data, true);
        $obj = json_decode($data, true);
        // $ovj = json_decode($data);
        // var_dump($data,$obj,$ovj);
        // echo '<pre>';
        
        // echo $obj['openid'];
        // die;
        
        // die;



        $state = $req->state;


        $model = new Order;
        $orderInfo = $model->select('real_payment')->where('number', $state)->first();

        

        // return $req->all();
        // $this->config['spbill_create_ip'] = session('cip');
        
        // return $wechat->spbill_create_ip;
        $order = [
            'out_trade_no' => '31241234214123',
            'total_fee' => '1', // **单位：分**
            'body' => '公租房相关费用缴纳',
            'openid' => $obj['openid'],
        ];
        // wap H5支付
        // $pay = $wechat->mp($order);
        $pay = Pay::wechat($this->config)->mp($order);
        // $data = json_encode($pay, TRUE);
        
        // var_dump($pay->items);
        // return view('Weixin.wechat',[
        //     'data' => $data,
        // ]);
        // return $pay; 
        // echo $pay->appId."<hr>";
        // echo $pay->timeStamp."<hr>";
        // echo $pay->nonceStr."<hr>";
        // echo $pay->package."<hr>";
        // echo $pay->signType."<hr>";
        // echo $pay->paySign."<hr>";
        // $arr = [];
        // $arr['appId'] = $pay->appId;
        // $arr['timeStamp'] = $pay->timeStamp;
        // $arr['nonceStr'] = $pay->nonceStr;
        // $arr['package'] = $pay->package;
        // $arr['signType'] = $pay->signType;
        // $arr['paySign'] = $pay->paySign;
        return view('Weixin.wechat',[
            'data' => $pay,
        ]);
    }

    public function notify()
    {
        $pay = Pay::wechat($this->config);

        try{
            $data = $pay->verify(); // 是的，验签就这么简单！

            if($data->result_code == 'SUCCESS' && $data->return_code == 'SUCCESS')
            {
                // 获取订单信息
                // $ret1 = Order::where('number',$data->out_trade_no)->update(['state'=>'1']);

                // $orderInfo = Order::where('number',$data->out_trade_no)->get();
                $order =  Order::where('number',$data->out_trade_no)->first();
                // 如果订单的状态为未支付状态 ，说明是第一次收到消息，更新订单状态 
                if($order->state == 0)
                {
                    // 开启事务
                    DB::beginTransaction();
                    // 设置订单为已支付状态
                    $ret1 = Order::where('number',$data->out_trade_no)->update(['state'=>'1']);

                    // 更新用户余额
                    $ret2 = DB::table($order->type)->where([
                        ['user_id','=',$order->user_id],
                        ['date','=',date('Y-m')],
                    ])->update(['state'=>1]);
                    if($ret1 && $ret2)
                    {
                        // 提交事务
                        DB::commit();
                    }
                    else
                    {
                        // 回滚事务
                        DB::rollBack();
                    }
                }
            }
        } catch (Exception $e) {
            // $e->getMessage();
        }
        
        return $pay->success();// laravel 框架中请直接 `return $pay->success()`
    }
}
