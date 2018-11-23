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
				<img src="/images/weixin/headimg.png"/>
				<div class="name">{{session('realname')}}</div>
				<div class="addr">{{session('village')}}</div>
			</div>
			<form action="/wxpay" method="post" id="order_form">
			{{csrf_field()}}
			<div class="detail">
				<div class="ordernum">单号:{{$num}}</div>
				<div>收费项<span style="float: right;">
				@if($name=='rent')
				房租
				@elseif($name=='water')
				水费
				@elseif($name=='electric')
				电费
				@elseif($name=='property')
				物业费
				@endif</span></div>
				<!-- <div>收费项<span style="float: right;">0.00</span></div>
				<div>收费项<span style="float: right;">0.00</span></div> -->
				<div class="all">总计<span style="float: right;color: red;font-size: 16px;">{{$data->money}}</span></div>
			</div>
			<input type="hidden" name="cip" id="cip">
			<input type="hidden" name="number" value="{{$num}}">
			<input type="hidden" name="type" value="{{$name}}">
			<input type="hidden" name="real_payment" value="{{$data->money}}">
			</form>
		</div>
		<div class="back" onclick="subform()">提交订单</div>
	</body>
</html>
<script src="/js/weixin/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
		var cip = localStorage.getItem('cip');
		document.getElementById('cip').value = cip;
		var form = document.getElementById('order_form');
		function subform () {
			form.submit();
		}
		var num = "{{$num}}";
		var type = "{{$name}}";//缴费项
		// var num = "{{$num}}";
		setInterval(function(){
			$.ajax({
				url:'/ajaxOrder',
				type:'GET',
				data:{num:num},
				success:function(data){
					// console.log(data.state);
					if(data.state==1)
					{
						location.href = "/success"
					}
				}
			})
		},1000)
		$.ajax({
			url: 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx4cbc0a5a5e78d748&redirect_uri=http://jngzf.cn/order/test&response_type=code&scope=snsapi_base#wechat_redirect',
			type:'GET',
			success:function(data){
				console.log(data)
			}
		})
  </script>
