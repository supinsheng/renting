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
			<form action="/wxpay" method="post" id="order_form">
			{{csrf_field()}}
			<div class="detail">
				<div class="ordernum">单号:123719372917382179</div>
				<div>收费项<span style="float: right;">0.00</span></div>
				<div>收费项<span style="float: right;">0.00</span></div>
				<div>收费项<span style="float: right;">0.00</span></div>
				<div class="all">总计<span style="float: right;color: red;font-size: 16px;">0.00</span></div>
			</div>
			<input type="hidden" name="cip" id="cip">
			</form>
		</div>
		<div class="back" onclick="subform()">提交订单</div>
	</body>
</html>
<script type="text/javascript">
		var cip = localStorage.getItem('cip');
		document.getElementById('cip').value = cip;
		console.log(cip);
		var form = document.getElementById('order_form');
		function subform () {
			form.submit();
		}
       
  </script>
