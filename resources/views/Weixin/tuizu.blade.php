<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>房屋退租</title>
	<link rel="stylesheet" type="text/css" href="/css/weixin/base.css" />
	<link rel="stylesheet" type="text/css" href="/css/weixin/tuizu.css" />
</head>

<body>
<form  action="{{route('weixin_tuizu')}}" method="post" id="submit">
			{{csrf_field()}}
		<div class="stitle">请输入您的真实姓名:</div>
		<input type="text" placeholder="请输入您的真实姓名..." name="username" />
		<div class="stitle">请输入您的手机号码:</div>
		<input type="text" placeholder="请输入您的手机号码..." name="phone" />
		<div class="stitle">请输入您的身份证号码:</div>
		<input type="text" placeholder="请输入您的身份证号码..." name="idcard" />
		<div class="stitle">请输入您的地址(包括小区楼层以及房间号):</div>
		<input type="text" placeholder="请输入您的地址(包括小区楼层以及房间号)..."  name="address"/>
		<input type="hidden" name="village" value="{{session('village')}}">
		<div class="stitle">其他说明</div>
		<textarea placeholder="请输入您的退租原因..." name="reason"></textarea>
		<div class="back" onclick="submit()">提交退租申请</div>
		<ul>
			@foreach($errors->all() as $e)
				<li style="color: red">{{$e}}</li>
			@endforeach
		</ul>
</form>
</body>
</html>
<script>
    function submit() {
        var form = document.getElementById('submit');
        //再次修改input内容
        form.submit();
    }
</script>