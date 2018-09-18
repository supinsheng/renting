<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>房屋变更</title>
		<link rel="stylesheet" type="text/css" href="/css/weixin/base.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/fwbg.css"/>
	</head>
	<body>
	<form action="{{route('weixin_fwbg')}}" method="post"  id="submit">
		{{csrf_field()}}
		<div class="stitle">现住房号</div>
		<input type="text" placeholder="请填写您的现住房号..." name="now-fw"/>
		<div class="stitle">变更房号</div>
		<input type="text" placeholder="请填写您的变更房号..." name="change-fw"/>
		<!--电话-->
		<div class="stitle">说明</div>
		<textarea placeholder="请输入您的退租原因..." name="shuoming"></textarea>
		<div class="back" onclick="submit()">确定变更</div>
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
