<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>合同详情</title>
		<link rel="stylesheet" type="text/css" href="/css/weixin/base.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/contract_detail.css"/>
	</head>
	<body>
       @foreach($data as $k=>$v)
		<div class="content">
            {!! $v->description !!}
		</div>
       @endforeach
	</body>
</html>
