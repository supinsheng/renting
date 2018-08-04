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
    <td width="99%" align="left" valign="top">您的位置：管理操作员</td>
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
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;">
          <a href="#" target="mainFrame" onFocus="this.blur()" class="add" data-toggle="modal" data-target="#addUser" data-whatever="@mdo">新增操作员</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
    @if($errors->any())
    @foreach($errors->all() as $e)
				<span style='color:red;margin-right:20px;' >{{$e}}</span>
    @endforeach
    @endif
    @if(session('success'))
    <span style='color:green'>{{session('success')}}</span>
    @endif
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">账号</th>
        <th align="center" valign="middle" class="borderright">密码</th>
        <th align="center" valign="middle" class="borderright">权限</th>
        <th align="center" valign="middle">操作</th>
      </tr>
    @foreach($data as $k=>$v)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->id }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->name }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->passwd }}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{ $v->jurisdiction }}</td>
        
        <td align="center" valign="middle" class="borderbottom">
          <a href="#" onclick="edit('{{$k}}')" target="mainFrame" style="color:green;" data-toggle="modal" data-target="#editUser" data-whatever="@mdo1">编辑</a>
          
          <a href="{{route('delUser',['id'=>$v->id])}}" onclick="return confirm('请确定是否要删除？ ')" target="mainFrame" style="color:red">删除</a>
        </td>
      </tr>
      @endforeach
    </table></td>
    </tr>

</table>

<form action="{{route('addUser')}}" method="post" id="loginForm">
      <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">添加操作员</h4>
            </div>
            <div class="modal-body">
              {{csrf_field()}}
              <div class="panel-body">
                <input type="text" name="name" class="form-control" placeholder="请输入正确的账号">
                <br>
                <input type="password" name="passwd" class="form-control" placeholder="请输入正确的密码">  
                        <br>     
                <select class="form-control" name="jurisdiction">
                @foreach($jurs as $v) 
										<option value="{{$v->id}}">{{$v->jurisdiction}}</option>
                 @endforeach
                </select>                
              </div>				
            </div>
			<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              <button type="submit" class="btn btn-primary">创建</button>
            </div>
          </div>
        </div>
      </div>
	</form>
	<form action="{{route('editUser')}}" method="post" id="form1">
      <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">编辑操作员</h4>
            </div>
            <div class="modal-body">
	
				<div class="panel-body">
					{{csrf_field()}}
          <input type="text" id="edit-name" name="name" class="form-control" placeholder="请输入正确的账号">
          <br>
          <input type="password" id="edit-pwd" name="passwd" class="form-control" placeholder="请输入正确的密码">  

					<br>
          <select id="jurSelect" class="form-control" name="jurisdiction">
            @foreach($jurs as $v) 
							<option value="{{$v->id}}">{{$v->jurisdiction}}</option>
             @endforeach
          </select> 					
            <br>
					<input type="hidden" id="edit-id" name="id" value="">
				</div>				
			</div>
			<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              <button type="submit" class="btn btn-primary">修改</button>
            </div>
          </div>
        </div>
      </div>
    </form>


<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
    let jur = '{{$jurs}}';
    jurs=JSON.parse(jur.replace(/&quot;/g,'"'));
    // console.log(jurs);
    function edit(k){
        let str = '{{$data}}';
        s1=str.replace(/&quot;/g,'"');//将&quot; 转义为空
        let s2 = JSON.parse(s1);
        let name = s2[k].name;
        let cur = s2[k].jurisdiction;
        let id = s2[k].id;
        let pwd  = s2[k].passwd
        
        let html = '';
        for(let i=0;i<jurs.length;i++){
          if(jurs[i].jurisdiction == cur){
            html += `<option value="${jurs[i].id}" selected>${jurs[i].jurisdiction}</option>`;
          }else{
            html += `<option value="${jurs[i].id}">${jurs[i].jurisdiction}</option>`;
          }
        }
        document.getElementById('jurSelect').innerHTML = html;
        // console.log(id);
        // console.log(title,desc);
        // document.getElementById('标签id').innerText= '要修改的文本内容';
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-pwd').value = pwd;

        
    }
	function release(k){
		let str = '{{$data}}';
		s1=str.replace(/&quot;/g,'"');//将&quot; 转义为空
		let s2 = JSON.parse(s1);
		let title = s2[k].title;
		let desc = s2[k].description;
		let id = s2[k].id;
		// console.log(id);
		// console.log(title,desc);
		// document.getElementById('标签id').innerText= '要修改的文本内容';
		document.getElementById('release-title').value = title;
		document.getElementById('release-desc').innerText = desc;
		document.getElementById('release-id').value = id;
		
	}
</script>
</body>
</html>