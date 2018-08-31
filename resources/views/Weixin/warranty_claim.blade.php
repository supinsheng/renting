<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>保修申请</title>
		<link rel="stylesheet" type="text/css" href="/css/weixin/base.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/warranty_claim.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/weui.min.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/jquery-weui.min.css"/>
	</head>
	<body>
		<div class="wrap">
			<div class="list clearfix">
				<div class="item active">设备名称</div>
				<div class="item">设备名称</div>
				<div class="item">名称</div>
				<div class="item">其他</div>
				<div class="item">设备名称</div>
				<div class="item">设备名称</div>
			</div>
			<textarea placeholder="请您对设备故障进行描述..."></textarea>
			<!--图片上传-->
			<div class="weui-cells weui-cells_form">
			  <div class="weui-cell">
			    <div class="weui-cell__bd">
			      <div class="weui-uploader">
			        <div class="weui-uploader__hd">
			          <p class="weui-uploader__title">图片上传</p>
			          <div class="weui-uploader__info">0/2</div>
			        </div>
			        <div class="weui-uploader__bd">
			          <ul class="weui-uploader__files" id="uploaderFiles">
			            <li class="weui-uploader__file" style="background-image:url(img/bg.jpeg)"></li>
			            <li class="weui-uploader__file" style="background-image:url(img/bg.jpeg)"></li>
			            <li class="weui-uploader__file" style="background-image:url(img/bg.jpeg)"></li>
			            <li class="weui-uploader__file" style="background-image:url(img/bg.jpeg)"></li>
			          </ul>
			          <div class="weui-uploader__input-box">
			            <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple="">
			          </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
			<!--位置-->
			<div class="addr">这里显示住户地址</div>
		</div>
		<div class="submit">提交保修单</div>
	</body>
	<script src="/js/weixin/js/jquery-3.2.1.min.js"></script>
	<script src="/js/weixin/jquery-weui.min.js"></script>
	<script>
		$('.list div').click(function(){
			$(this).addClass('active');
			$(this).siblings().removeClass('active');
		});
	</script>
</html>
