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
#search a.add{ background:url(/images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
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
.btn {
    float:right;
    margin-top:-35px;
    margin-right: 20px;
    width: 80px;
    height: 30px;
    background-color: green;
    border: 1px solid rgb(29, 58, 255);
    border-radius: 5px;
}
.btn a {
    color: #fff;
    font-size: 14px;
    text-decoration: none;
}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：住户管理</td>
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
      </tr>
  </table>
  <button class="btn"><a href="{{ route('addHousehold') }}">录入住户</a></button>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">用户名</th>
        <th align="center" valign="middle" class="borderright">姓名</th>
        <th align="center" valign="middle" class="borderright">电话</th>
        <th align="center" valign="middle" class="borderright">身份证</th>
        <th align="center" valign="middle" class="borderright">入住时间</th>
        <th align="center" valign="middle" class="borderright">入住时长</th>
        <th align="center" valign="middle" class="borderright">用户住址</th>
        <th align="center" valign="middle" class="borderright">小区</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      @foreach($household as $h)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{ $h->id }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $h->username }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $h->realname }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $h->phone }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $h->cardId }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $h->start }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $h->time }}个月</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $h->address }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $h->village }}</td>
        <td align="center" valign="middle" class="borderbottom"><a href="{{ route('editHousehold',['id'=>$h->id]) }}" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span>
        <a href="{{ route('deleteHousehold',['id'=>$h->id]) }}" onclick="return confirm('确定要删除吗？')" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
      @endforeach
      
    </table></td>
    </tr>
  <tr>
    <td align="left" style="text-align:center" valign="top" class="fenye">{{ $household->appends($req->all())->links() }}</td>
  </tr>
</table>
</body>
</html>