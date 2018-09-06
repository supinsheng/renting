<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>房屋续租</title>
	<link rel="stylesheet" type="text/css" href="/css/weixin/base.css" />
	<link rel="stylesheet" type="text/css" href="/css/weixin/tuizu.css" />
</head>

<body>
	<div id="app">
		<div class="stitle">请输入您的真实姓名:</div>
		<input type="text"  placeholder="请输入您的真实姓名..." />
		<div class="stitle">请输入您的手机号码:</div>
		<input type="text" placeholder="请输入您的手机号码..." />
		<div class="stitle">请输入您的身份证号码:</div>
		<input type="text"  placeholder="请输入您的身份证号码..." />
		<div class="stitle">请输入您的地址(包括小区楼层以及房间号):</div>
		<input type="text"  placeholder="请输入您的地址(包括小区楼层以及房间号)..." />
		<div class="stitle" id="job">请选择您续租的时长:</div>
		<div class="weui_cell weui_cell_select">
			<div class="weui_cell_bd weui_cell_primary">
				<select class="weui_select" name="select1" >
					<option selected="" value="0">选择</option>
					<!-- 十二为一年 -->
					<option value="1">一个月</option>
					<option value="3">三个月</option>
					<option value="6">半年</option>
					<option value="12">一年</option>
				</select>
			</div>
		</div>
		<div class="back" >提交续租申请</div>
	</div>
</body>
</html>