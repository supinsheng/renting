<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="/css/css.css" type="text/css" rel="stylesheet" />
<link href="/css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="/images/main/favicon.ico" />
<link rel="stylesheet" href="/css/page.css">
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(/images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{  padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(/images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：退租管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	        <form>
              <span>管理员：</span>
              <input type="text" name="keyword" value="" class="text-word">
              <input name="" type="submit" value="查询" class="text-but">
	        </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="{{ route('add_tuizu') }}" target="mainFrame" onFocus="this.blur()" class="add">新增退租</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">姓名</th>
        <th align="center" valign="middle" class="borderright">电话</th>
        <th align="center" valign="middle" class="borderright">身份证</th>
        <th align="center" valign="middle" class="borderright">住址</th>
        <th align="center" valign="middle" class="borderright">小区</th>
        <th align="center" valign="middle" class="borderright">退租原因</th>
        <th align="center" valign="middle" class="borderright">审核状态</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      @foreach($tuizu as $tz)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{ $tz->id }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $tz->realname }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $tz->phone }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $tz->cardId }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $tz->address }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $tz->village }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $tz->tuizu_cause }}</td>
        @if( $tz->state != '审核中')
        <td align="center" valign="middle" class="borderright borderbottom">{{ $tz->state }}</td>
        @else
        <td align="center" valign="middle" class="borderbottom"><a style="text-decoration:none" href="{{ route('tzStateY',['id'=>$tz->id]) }}" onclick="return confirm('当前操作为：审核 通过，请确认！')" target="mainFrame" onFocus="this.blur()" class="add">通过</a><span class="gray">&nbsp;|&nbsp;</span>
        <a href="{{ route('tzStateN',['id'=>$tz->id]) }}" style="text-decoration:none" onclick="return confirm('当前操作为：审核 不通过，请确认！')" target="mainFrame" onFocus="this.blur()" class="add">不通过</a></td>
        @endif
        <td align="center" valign="middle" class="borderbottom"><a href="{{ route('edit_tuizu',['id'=>$tz->id]) }}" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span>
        <a href="{{ route('del_tuizu',['id'=>$tz->id]) }}" onclick="return confirm('确定要删除吗？')" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
      @endforeach
    </table></td>
    </tr>
    <tr>
    <td align="left" style="text-align:center" valign="top" class="fenye">{{ $tuizu->appends($req->all())->links() }}</td>
  </tr>
</table>
</body>
</html>