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
					<div  class="xieyi">
						<a href="{{route('retrieve2')}}" style="color:#333;">忘记密码?</a>
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
	var jwt = localStorage.getItem('jwt');
	console.log(jwt)
	if(jwt != null) {
		var url = "{{route('jwt')}}"+'?jwt='+jwt;
		$.get(url,function(data){
			// console.log(data)
			if(data == 1){
				// 跳转到首页
				location.href = "{{route('weixin_index')}}";
			} else{
				alert('用户信息已失效，请重新登录！');
				localStorage.removeItem('jwt');
			}
		})
	}
	

	//点击登录提交表单
	var form = document.getElementById('test_form');
    function subform () {
        form.submit();
    }
</script>

