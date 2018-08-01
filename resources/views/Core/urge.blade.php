@extends('core.layouts.temp')
@section('main')
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
			@if($errors->any())
			<div class="alert alert-warning alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				@foreach($errors->all() as $e)
				<p>{{$e}}</p>
				@endforeach
			</div>
			@endif

				<div class="container-fluid">
					<h3 class="page-title">催缴列表</h3>
					<div id="toastr-demo" class="panel">
						<div class="defaultTab-T">
							<table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
								<tbody><tr>
									<th class="t_1">编号</th>
									<th class="t_2_1">用户名</th>
									<th class="t_3">截止日期</th>
									<th class="t_5">到期天数</th>
									<th class="t_4">电话</th></tr>
							</tbody></table>
						</div>
						<table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
							<tbody>
							@foreach($data as $k=>$d)
							<tr>
								<td class="t_1">{{$k+1}}</td>
								<td class="t_2_1">{{$d->username}}</td>
								<td class="t_3">{{str_limit($d->data,10,'')}}</td>
								<td class="t_5" style="color:red">{{$d->days}}</td>
								<td class="t_4">
								
									<button type="button" onClick="showModal({{$k}})" class="btn btn-danger" data-toggle="modal" data-target="#urgePay" data-whatever="@mdo1" >催缴</button>

									<!-- </div> -->
								</td>
							</tr>
							@endforeach
						</tbody></table>
		
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	
	</div>

      <div class="modal fade" id="urgePay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">新建策略</h4>
            </div>
            <div class="modal-body">
						<button type="button" class="btn btn-warning" id="showPhone">显示电话</button>
										<button type="button" id="sendSmsDiv" class="btn btn-danger">发送短信</button>
						<div class="alert alert-info hidden" id="mobileShow" role="alert" style="margin-top:20px"></div>
						<div class="alert alert-warning  hidden " id="sendSmsDivShow" role="alert" style="margin-top:20px">
						
						<string>很抱歉，该功能正在研发中...</string>
						</div>
						</div>
						<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
          </div>
        </div>
      </div>

	<!-- Javascript -->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/vendor/toastr/toastr.min.js"></script>
	<!-- <script src="/scripts/klorofil-common.js"></script> -->
	<script>
	function showModal(k){
			let str = '{{$data}}';
			s1=str.replace(/&quot;/g,'"');//将&quot; 转义为空
			let s2 = JSON.parse(s1);
		
			let mobile = s2[k].phone;
			// let desc = s2[k].description;
			// let id = s2[k].id;
			// // console.log(id);
			// // console.log(title,desc);
			// // document.getElementById('标签id').innerText= '要修改的文本内容';
		document.getElementById('mobileShow').innerText = mobile;
			// $("#mobileShow").removeClass("hidden");
			// document.getElementById('edit-desc').innerText = desc;
			// document.getElementById('edit-id').value = id;
			
		}
		$('#showPhone').click(function () {
			$("#mobileShow").toggleClass("hidden");
		})
		$('#sendSmsDiv').click(function () {
			$("#sendSmsDivShow").toggleClass("hidden");
		})
		// var seconds = 60;
		// var si;
    //   function sendSms(mobile){
		// 	//执行AJAX发到服务器
		// 	$.ajax({        
		// 		type:"GET",
		// 		url:"{{route('coreSendSms')}}",
		// 		data:{mobile:mobile},
		// 		success:function(data){
		// 			console.log(data);
		// 			// 设置按钮失效
		// 			$("#btn-send").attr('disabled',true);
		// 			//每1秒执行一次
		// 			si = setInterval(function (){
		// 				seconds--;
		// 				if(seconds==0)
		// 				{
		// 					//生效
		// 					$("#btn-send").attr('disabled',false);
		// 					seconds = 60;
		// 					// $('#btn-send').val("发送验证码");
		// 					document.getElementById('btn-send').innerText = '催缴';
		// 					//关闭定时器
		// 					clearInterval(si);
		// 				}
		// 				else{
		// 					document.getElementById('btn-send').innerText = "还剩："+(seconds);
							
		// 				}
		// 			}, 1000)
		// 		}
		// 	});
		// };
		
	</script>
@endsection
