<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>报修清单</title>
		<link rel="stylesheet" type="text/css" href="/css/weixin/base.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/warranty_list.css"/>
	</head>
	<body>
		<div class="wrap">
			@foreach($data as $k=>$v)
			<div class="top">
				<div class="topt">
					<span>{{$v->device_name}}</span>
					@if($v->state=="审核中")
					<div class="stit"><span style="background-color: #8BC34A;">审核中</span></div>
					@elseif($v->state=="审核成功")
					<div class="stit"><span style="background-color: #FF6B6B;">审核成功</span></div>
					@else
					<div class="stit"><span style="background-color: #FF9800;">审核失败</span></div>
					@endif
					<span style="float: right;">NO.{{$v->flow_number}}</span>
				</div>
				<div class="content">
					{{$v->describe}}
				</div>
				<!--报修图-->
				<div class="img">
					<img src="{{$v->img}}">
				</div>
			</div>
			@endforeach
			<div class="addr">所在小区：{{$v->address}}</div>
		</div>
{{--		<div class="handle">
			<div style="background-color: #35AD1A;">修改清单</div>
			<div style="background-color: #E51C23;">取消清单</div>
		</div>--}}
	</body>
</html>
