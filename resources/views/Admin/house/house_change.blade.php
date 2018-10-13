<!DOCTYPE html>
<html lang="en">
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
  text-align:center;
}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：房屋变更</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	        <!-- <form>
              <span>管理员：</span>
              
              <input type="text" name="keyword" value="" class="text-word">
              <input name="" type="submit" value="查询" class="text-but">
              
	        </form> -->
         </td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">住户账号</th>
        <th align="center" valign="middle" class="borderright">现住房号</th>
        <th align="center" valign="middle" class="borderright">想变更的房号</th>
        <th align="center" valign="middle" class="borderright">原因</th>
        <th align="center" valign="middle" class="borderright">审核状态</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      @foreach($changes as $k=>$v)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->id }}</td>
        <td align="center" valign="middle" class="borderright borderbottom"> {{ $v->username }}
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->now }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->want }}</td>
        <td align="center" valign="middle" class="borderright borderbottom" title="{{ $v->explain }}">{{ $v->explain }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">
        @if($v->to_examine==0) 正在审核中 @elseif($v->to_examine==1) 通过 @else 不通过  @endif
        </td>     
        <td align="center" valign="middle" class="borderbottom"><span class="gray"></span>
        @if($v->to_examine==0)
        <form action="{{route('house_doChange')}}" method="post">
        {{csrf_field()}}
          <input type="hidden" name="id" value="{{ $v->id }}">
          <input type="hidden" name="username" value="{{ $v->username }}">
          <input type="hidden" name="now" value="{{ $v->now }}">
          <input type="hidden" name="want" value="{{ $v->want }}">
          <input type="hidden" name="to_examine" value="1">
          <input type="submit" value="通过" onclick="return confirm(' 请确定是否执行该操作？')" class="btn btn-default btn-xs">
        </form>
        <form action="{{route('house_doChange')}}" method="post">
        {{csrf_field()}}
          <input type="hidden" name="id" value="{{ $v->id }}">
          <input type="hidden" name="to_examine" value="2">
          <input type="submit" value="不通过" onclick="return confirm(' 请确定是否执行该操作？')" class="btn btn-default btn-xs">
        </form>
        <!-- <a href="{{ route('del_house',['id'=>$v->id]) }}"  target="mainFrame">通过</a> -->
        <!-- <a href="{{ route('del_house',['id'=>$v->id]) }}"  target="mainFrame">不通过</a> -->
        @endif
        <a href="{{ route('del_house',['id'=>$v->id]) }}" onclick="return confirm(' 请确定是否执行该操作？')" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
      </tr>
      @endforeach
    </table></td>
    </tr>

  <tr>
    
  </tr>
</table>

</body>
</html>