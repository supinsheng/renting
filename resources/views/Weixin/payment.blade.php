<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>在线缴费</title>
		<link rel="stylesheet" type="text/css" href="/css/weixin/base.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/online_payment.css"/>
	</head>
	<body>
		<div class="wrap">
			<div class="tips">
				请认真核对支付信息
			</div>
			<div class="user clearfix">
				<img src="img/headimg.png"/>
				<div class="name">{{session('realname')}}</div>
				<div class="addr">{{session('village')}}</div>
			</div>
			<div class="detail">
				<div class="ordernum">单号:123719372917382179</div>
				<div>收费项<span style="float: right;">0.00</span></div>
				<div>收费项<span style="float: right;">0.00</span></div>
				<div>收费项<span style="float: right;">0.00</span></div>
				<div class="all">总计<span style="float: right;color: red;font-size: 16px;">0.00</span></div>
			</div>
		</div>
		<div class="back" id="send">提交订单</div>
	</body>
</html>
<script type="text/javascript">
		var div = document.getElementById('send');
		div.onclick = function(){
			 //用户点击跳转地址（非静默授权） 参数appid为公众号的id redirect_uri为微信回调接口 state为可携带的参数
			//  window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx426b3015555a46be&redirect_uri=http://0e8bdefa.ngrok.io/wxpay/notify&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
			window.location.href="https://wx.tenpay.com/cgi-bin/mmpayweb-bin/checkmweb?prepay_id=wx20161110163838f231619da20804912345&package=1037687096&redirect_url=https%3A%2F%2Fwww.wechatpay.com.cn"
		}
       
  </script>
