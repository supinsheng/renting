<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>本月清单</title>
	<link rel="stylesheet" type="text/css" href="/css/weixin/base.css" />
	<link rel="stylesheet" type="text/css" href="/css/weixin/month_list.css" />
</head>

<body>
	<div class="wrap">
		<div class="title">我的本月清单</div>
		<div class="tips">请选择要支付的账单</div>
		<form action="/order" id="form" method="post">
			{{csrf_field()}}
			@if($rent != '')
			<div class="list">

				<div class="item clearfix">

					<label>

						<input type="radio" name="type" value="{{$rent->table}}">房租
						<small>未支付</small>

						<span style="color: red;float: right;font-size: 16px;">{{$rent->money}}</span>
					</label>

				</div>
			</div>
			@endif
			@if($water != '')
			<div class="list">

				<div class="item clearfix">

					<label>

						<input type="radio" name="type" value="{{$water->table}}">水费
						<small>未支付</small>

						<span style="color: red;float: right;font-size: 16px;">{{$water->money}}</span>
					</label>

				</div>
			</div>
			@endif
			@if($elec != '')
			<div class="list">

				<div class="item clearfix">

					<label>

						<input type="radio" name="type" value="{{$elec->table}}">电费
						<small>未支付</small>

						<span style="color: red;float: right;font-size: 16px;">{{$elec->money}}</span>
					</label>

				</div>
			</div>
			@endif
			@if($prop != '')
			<div class="list">

				<div class="item clearfix">

					<label>

						<input type="radio" name="type" value="{{$prop->table}}">物业费
						<small>未支付</small>

						<span style="color: red;float: right;font-size: 16px;">{{$prop->money}}</span>
					</label>

				</div>
			</div>
			@endif
		</form>

	</div>
	<div class="handle">

		<div style="width:100%;background-color: #E51C23;" onclick="subform()">确定</div>
	</div>
</body>

</html>
<script src="/js/weixin/jquery-3.2.1.min.js"></script>
<script>
	var form = document.getElementById('form');
	function subform() {
		if($(":radio:checked").length ==0)
		{
			alert('请选择缴费项')
		}
		else
		{
			form.submit();
		}
	}
</script>