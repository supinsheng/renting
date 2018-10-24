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
  /* border: 1px solid #fff; */
  margin-left: 5px;
}
.clear{
   clear:both; 
   height: 0; 
   height: 0; 
   overflow:hidden;
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
   		 <td width="90%" align="left" valign="middle">
	        <form>
              <span>管理员：</span>
              
              <input type="text" name="keyword" value="" class="text-word">
              <input name="" type="submit" value="查询" class="text-but">
              
	        </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="{{ route('add_house') }}" target="mainFrame" onFocus="this.blur()" class="add">新增房屋</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    
  </tr>
</table>
@foreach($vills as $v)
  <div class="main-sort">

    <p ><span class="main-sort-header">{{$v->name}}</span></p>
    <ul class="main-sort-block">
    <!-- 未出租房屋 -->
    @foreach($house as $h)
      @if($v->name == $h->village && $h->state == '未出租')
      <li><p class="main-sort-block-title">{{$h->house_id}}</p>
      
        <span class="main-sort-block-icon"><i class="fa fa-lock fa-4x" style="color:#fff"></i></span>
        <div class="block-lived">
          <a href="{{ route('del_house',['id'=>$h->id]) }}" onclick="return confirm(' 如果房屋已出租，删除房屋对应的住户也会被删除，请确定是否要删除？ ')" target="mainFrame" onFocus="this.blur()"><i class="fa fa-times fa-lg" style="color:#fff"></i></a>
        </div>
      </li>
      @elseif($v->name == $h->village && $h->state == '已出租')
      <!-- 已出租房屋 -->
      <li style="background-color:#295f90"><p class="main-sort-block-title">{{$h->house_id}}</p>
      
        <div class="main-sort-block-icon2"><span style="white-space:nowrap; width:10px;">{{$h->hold_name}}</span><i class="fa fa-user-circle fa-3x" style="color:#fff"></i></div>
        <div class="block-lived">
          <a href="#"  title="{{$h->hold_phone}}"> <i class="fa fa-phone fa-lg" style="color:#fff"></i></a>
          <a href="#"  title="入住时间: {{$h->start_time}} &#10;到期时间: {{$h->end_time}} "> <i class="fa fa-eye fa-lg" style="color:#fff"></i></a>
          <a href="#"  title="剩余租期: {{$h->residual_lease}} "> <i class="fa fa-bell fa-lg" style="color:#fff"></i></a>
          <a href="{{route('house.edit',['id'=>$h->id])}}"  title="修改"> <i class="fa fa-edit fa-lg" style="color:#fff"></i></a>
          <a href="{{ route('del_house',['id'=>$h->id]) }}" onclick="return confirm(' 如果房屋已出租，删除房屋对应的住户也会被删除，请确定是否要删除？ ')" target="mainFrame" onFocus="this.blur()"><i class="fa fa-times fa-lg" style="color:#fff"></i></a>
        </div>
      </li>
      @endif
    @endforeach
    </ul>

  </div>
  <div class="clear"></div>
  @endforeach
  
</body>
</html>