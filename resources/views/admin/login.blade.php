<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理登录界面</title>
    <link href="css/alogin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form id="form1" runat="server" action="{{ route('admin_doLogin') }}" method="post">
        {{ csrf_field() }}
    <div class="Main">
        <ul>
            <li class="top"></li>
            <li class="top2"></li>
            <li class="topA"></li>
            <li class="topB"><span><h1 style="text-align:center;margin-top:70px;">建宁县公租房</h1><h3 style="text-align:center">后台管理系统</h3></span></li>
            <li class="topC"></li>
           
            <li class="topD">
                <ul class="login">
                    <li><span class="left login-text">用户名：</span> <span style="left">
                        <input id="Text1" type="text" class="txt" name="name"/>  
                        
                    </span></li>
                    
                    @if($errors->has('name'))
                        <span style='color:red'>{{$errors->first('name')}}</span>
                    @endif
                    <li><span class="left login-text">密码：</span> <span style="left">
                       <input id="Text2" type="password" class="txt" name="passwd" /> 
                       
                    </span></li>
                    @if($errors->has('passwd'))
                        <span style='color:red'>{{$errors->first('passwd')}}</span>
                    @endif
					
                </ul>
            </li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C"><span class="btn"><input name="" type="image" src="images/login/btnlogin.gif" /></span></li>
            <li class="middle_D"></li>
            <li class="bottom_A"></li>
            <li class="bottom_B">网站后台管理系统&nbsp;&nbsp;www.php.com</li>
            @if($errors->has('error'))
                        <script>alert("{{$errors->first('error')}}")</script>
                    @endif
        </ul>
    </div>
    </form>
</body>
</html>