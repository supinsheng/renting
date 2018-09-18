<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>合同管理</title>
		<link rel="stylesheet" type="text/css" href="/css/weixin/base.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/contract.css"/>
	</head>
	<body>
		<div style="padding: 12px;box-sizing: border-box;">
			合同列表
		</div>
		@foreach($data as $k=>$v)
		<div class="list"   onclick="location.href='{{route('weixin_htxq',['id' => $v->id])}}' ">
			{{$v->title}}
			<span>点击查看详情</span>
		</div>
		@endforeach
	</body>
</html>
