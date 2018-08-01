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
									<th class="t_4">操作</th></tr>
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
								
                           
									<button type="button" class="btn btn-danger" id="btn-send" onclick="sendSms('{{$d->phone}}')">催缴</button>

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


	<!-- Javascript -->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/vendor/toastr/toastr.min.js"></script>
	<!-- <script src="/scripts/klorofil-common.js"></script> -->
	<script>
		var seconds = 60;
		var si;
      function sendSms(mobile){
				console.log(mobile);
			//执行AJAX发到服务器
			$.ajax({        
				type:"GET",
				url:"{{route('coreSendSms')}}",
				data:{mobile:mobile},
				success:function(data){
					console.log(data);
					// 设置按钮失效
					$("#btn-send").attr('disabled',true);
					//每1秒执行一次
					si = setInterval(function (){
						seconds--;
						if(seconds==0)
						{
							//生效
							$("#btn-send").attr('disabled',false);
							seconds = 60;
							// $('#btn-send').val("发送验证码");
							document.getElementById('btn-send').innerText = '催缴';
							//关闭定时器
							clearInterval(si);
						}
						else{
							document.getElementById('btn-send').innerText = "还剩："+(seconds);
							
						}
					}, 1000)
				}
			});
		};
		
	</script>
@endsection
