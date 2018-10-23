<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>主要内容区main</title>
<link href="/css/css.css" type="text/css" rel="stylesheet" />
<link href="/css/main.css" type="text/css" rel="stylesheet" />

<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/vendor/linearicons/style.css">
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

.main-sort {
  margin-top: 20px;
}
.main-sort-header {
  background-color: #4d514d;
  color: #fff;
  padding: 3 10px;
  font-size: 14px;
}
.main-sort-block {
  margin-top: 10px;
  margin-left: 15px;
}
.main-sort-block li {
  float: left;
  width: 215px;
  height: 160px;
  background-color: #A9A9A9;
  margin-right: 5px;
  margin-bottom: 5px;
  position: relative;
}
.main-sort-block-icon {
  position: absolute;
  left: 50%;
  top: 60px;
  margin-left:-20px;
  /* background-color: #33ccff; */
  width: 40px;
  height: 40px;
}
.main-sort-block-title {
  color: #fff;
}
/*已经居住的房屋图标*/
.main-sort-block-icon2 {
  position: absolute;
  left: 50%;
  top: 48px;
  margin-left:-20px;
  /* background-color: #33ccff; */
  width: 40px;
  height: 40px;
  color: #fff;
}
.block-lived {
  position:absolute;
  bottom: 3px;
  right: 3px
}
.block-lived a {
  display: inline-block;
  width: 25px;
  height: 25px;
  border-radius: 12.5px;
  padding: 5px;
  /* background-color: #000; */
  border: 1px solid #fff;
  margin-left: 5px;
}
.clear{
   clear:both; 
   height: 0; 
   height: 0; 
   overflow:hidden;
}
table tr th {
  text-align: center;
}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：房屋出租状态查询</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%">
	        <form>
              <span>管理员：</span>
              
              <input type="text" name="keyword" value="" class="text-word">
              <input name="" type="submit" value="查询" class="text-but">
              
	        </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="{{ route('agreement_add') }}" target="mainFrame" onFocus="this.blur()" class="add">新增协议</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">协议标题</th>
        <th align="center" valign="middle" class="borderright">协议内容</th>
        <th align="center" valign="middle" class="borderright">创建时间</th>
        
        <th align="center" valign="middle">操作</th>
      </tr>
      @foreach($data as $v)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->id }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->title }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ str_limit($v->description, 80, '...') }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->created_at }}</td>
        
        
        <td align="center" valign="middle" class="borderbottom"><span class="gray"></span>
        <a href="{{ route('agreement_edit',['id'=>$v->id] )}}">修改</a>
        <a href="{{ route('del_house',['id'=>$v->id]) }}" onclick="return confirm(' 如果房屋已出租，删除房屋对应的住户也会被删除，请确定是否要删除？ ')" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
      @endforeach
    </table></td>
    </tr>
   <tr>
  </tr>
  <tr>
    
  </tr>
</table>

  
</body>
</html>