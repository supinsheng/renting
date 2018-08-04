<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>主要内容区main</title>
<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
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
th {
    text-align: center;
}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：收费管理</td>
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
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">住户</th>
        <!-- <th align="center" valign="middle" class="borderright">房屋状态</th> -->
        <th align="center" valign="middle" class="borderright">用户名</th>
        <th align="center" valign="middle" class="borderright">缴费期限</th>
        <th align="center" valign="middle" class="borderright">水费</th>
        <th align="center" valign="middle" class="borderright">电费</th>
        <th align="center" valign="middle" class="borderright">房租费</th>
        <th align="center" valign="middle" class="borderright">物业费</th>
        <th align="center" valign="middle">其他费用</th>
      </tr>
    @foreach($data as $k=>$v)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->id }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->realname }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->username }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->data }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->water_rent }}
        <a href="#" onClick="edit('{{$v->id}}','水费','water_rent','{{$v->water_rent}}')" data-toggle="modal" data-target="#updatePay" data-whatever="@mdo1">改</a>
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->power_rate }}
        <a href="#" onClick="edit('{{$v->id}}','电费','power_rate','{{$v->power_rate}}')" data-toggle="modal" data-target="#updatePay" data-whatever="@mdo1">改</a>
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->rent }}
        <a href="#" onClick="edit('{{$v->id}}','房租费','rent','{{$v->rent}}')" data-toggle="modal" data-target="#updatePay" data-whatever="@mdo1">改</a>
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->property_fee }}
        <a href="#" onClick="edit('{{$v->id}}','物业费','property_fee','{{$v->property_fee}}')" data-toggle="modal" data-target="#updatePay" data-whatever="@mdo1">改</a>
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->other_expenses }}
        <a href="#" onClick="edit('{{$v->id}}','其他费用','other_expenses','{{$v->other_expenses}}')" data-toggle="modal" data-target="#updatePay" data-whatever="@mdo1">改</a>
        </td>
        
        <td align="center" valign="middle" class="borderbottom"><span class="gray"></span>
      </tr>
      @endforeach
    </table></td>
    </tr>
    <tr>
    <td align="left" style="text-align:center" valign="top" class="fenye">{{ $data->appends($req->all())->links() }}</td>
  </tr>
</table>

  <form action="{{route('doEdit_payment')}}" method="post" id="form2">
      <div class="modal fade" id="updatePay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">更改收费</h4>
            </div>
            <div class="modal-body">
	
				<div class="panel-body">
				{{csrf_field()}}
      
          <p  class="form-control" id="pay-name"></p>
          <br>
          <input type="number" id="edit-price" name="price"  class="form-control" >					<br>
          <input type="hidden" id="edit-id" name="id" value="">
          <input type="hidden" id="edit-name" name="name" value="">

				</div>				
			</div>
			<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              <button type="submit" class="btn btn-primary">确认更改</button>
            </div>
          </div>
        </div>
      </div>
    </form>

  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script>
    function edit(id,name,payName,price){
	
			// document.getElementById('标签id').innerText= '要修改的文本内容';
			document.getElementById('pay-name').innerText = name;
			document.getElementById('edit-price').value = price;
			document.getElementById('edit-id').value = id;
      document.getElementById('edit-name').value = payName;
			
		}
  </script>
</body>
</html>