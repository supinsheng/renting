<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>掌上公租房</title>
		<link rel="stylesheet" type="text/css" href="/css/weixin/base.css"/>
		<link rel="stylesheet" type="text/css" href="/css/weixin/login.css"/>
	</head>
	<body>
		<div class="wrap">
			<form action="{{ route('weixin_dologin') }}" id="test_form"  method="post">
				{{csrf_field()}}
				<div class="main">
					<img src="/images/weixin/logo.png"/>
					<input type="text" placeholder="会员账号" name="username" />
					<input type="text" placeholder="会员密码" name="password" />
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $e)
                                <li style="color: red">{{$e}}</li>
                            @endforeach
                        </ul>
                    @endif
					<div class="xieyi">
						<input type="checkbox" name="isagree" />我同意<a href="">《建宁县公租房微信平台协议》</a>
					</div>
					<div class="login" onclick="subform()">
						登录
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
<script src="/js/weixin/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
	// var cip = returnCitySN["cip"]+','+returnCitySN["cname"]
	// localStorage.setItem('cip',returnCitySN['cip'])
	$.ajax({
		url:'http://blog.huyp.xin/1.php',
		type:'GET',
		success:function(data){
			localStorage.setItem('cip',data)
		}
	})
	
	//点击登录提交表单
	var form = document.getElementById('test_form');
    function subform () {
        form.submit();
    }
</script>

