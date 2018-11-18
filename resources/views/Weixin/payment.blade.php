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
		<form action="{{route('wxpay')}}" method="post">
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
			<input type="submit" value="提交订单" class="back">
			
		</form>
		</div>
		
	</body>
</html>
<script type="text/javascript">
        //用户点击跳转地址（非静默授权） 参数appid为公众号的id redirect_uri为微信回调接口 state为可携带的参数
        window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=http://jngzf.cn/weChatpay/mainServlet&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";

  </script>

