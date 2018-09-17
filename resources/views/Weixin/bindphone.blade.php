<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>更换手机</title>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<link rel="stylesheet" type="text/css" href="css/bindphone.css"/>
	</head>
	<body>
		<div class="stitle">手机</div>
		<input type="text" class="phone" placeholder="请填写您的联系方式..."/>
		<input type="button" class="obtain generate_code sendcode" value=" 获取验证码" onclick="settime(this);">
		<!--电话-->
		<div class="stitle">验证码</div>
		<input type="text" placeholder="请填写您的验证码..."/>
		<div class="back">更换手机</div>
	</body>
	<script src="js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script>
		//倒计时  
			var countdown = 60;
			//发送验证码
			function settime(val) {
				if(countdown == 0) {
					val.removeAttribute("disabled");
					val.value = "获取验证码";
					countdown = 60;
					return false;
				} else {
					val.setAttribute("disabled", true);
					val.value = "重新发送(" + countdown + ")";
					countdown--;
				}
				setTimeout(function() {
					settime(val);
				}, 1000);
			}
	</script>
</html>
