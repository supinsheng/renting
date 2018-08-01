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
			@if (session('success'))
			<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<i class="fa fa-check-circle"></i>  {{ session('success') }}
			</div>
			@endif
				<div class="container-fluid">
					<h3 class="page-title">住户管理列表</h3>
					<div id="toastr-demo" class="panel">
						<div class="defaultTab-T">
							<table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
								<tbody><tr>
									<th class="t_1">编号</th>
									<th class="t_2_1">住户名字</th>
									<th class="t_3">房屋</th>
									<th class="t_5">所在小区</th>
									<th class="t_4">操作</th></tr>
							</tbody></table>
						</div>
						<table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
							<tbody>
							@foreach($data as $k=>$d)
							<tr>
								<td class="t_1">{{$d->id}}</td>
								<td class="t_2_1">{{$d->realname}}</td>
								<td class="t_3">{{$d->address}}</td>
								<td class="t_5">{{$d->village}}
								</td>
								<td class="t_4">
								
									<div class="cr-btn">
							
									<a  onClick="currentState({{$d->id}})" class="Top" data-toggle="modal" data-target="#currentState" data-whatever="@mdo2">当前状态</a>
									<a href="#" class="modify" onClick="isPay({{$d->id}})" data-toggle="modal" data-target="#isPay" data-whatever="@mdo3">缴费情况</a>
									<a onclick="addCelue('{{$d->username}}')" href="#"  class="delete" data-toggle="modal" data-target="#addCelue" data-whatever="@mdo4">定制策略</a></div>
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

	<!-- END WRAPPER -->
	<form action="{{route('add_celue')}}" method="post" id="loginForm">
      <div class="modal fade" id="addCelue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">新建策略</h4>
            </div>
            <div class="modal-body">
				{{csrf_field()}}
				<div class="panel-body">
					<input type="text" name="title" class="form-control" placeholder="请输入新策略的标题">
					<br>
					<textarea class="form-control" placeholder="请输入策略的内容" name="description" rows="6"></textarea>
					<input type="hidden" name="username" id="add_name">
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
		<div class="modal fade" id="currentState" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">编辑策略</h4>
					</div>
					<div class="modal-body">

							<table class="table table-bordered" >
								<tr id="state-th">
		
								</tr>
								<tr id="state-td">
								</tr>
						</table>	
					</div>

				<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="isPay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">用户的缴费情况</h4>
					</div>
					<div class="modal-body" id="modal-isPay-chart" style="width: 580px;height:350px">

						
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
	<script src="/js/echarts.min.js"></script>
	<script>
	console.log('{{Route::currentRouteName()}}');
		function addCelue(name){
			// console.log(name);
			// console.log(title,desc);
			// document.getElementById('标签id').innerText= '要修改的文本内容';
			document.getElementById('add_name').value = name;
			
		}
	
		var date   = new Date();
 		var monthn = date.getMonth()+1;
		// date.setMonth(date.getMonth()-5);
		//获取前6个月，然后定义一个数组，[1, 2, 3, 4, 5, 6, 7]
		var date1 = new Date();
		date1.setMonth(date1.getMonth()-4); 
		var start_month=date1.getMonth()+1;
		let addressMonths = [],curState = [];

		for(i=start_month;i<=monthn;i++){
			//定义每一个出租房的月份
			addressMonths.push({'mon':i,'paid':0,'unpaid':0})
			curState.push({'mon':i,'state':""})
		}
		function isPay(id){
			// let id = id;
			let ajax_url = "{{route('ajax_household')}}";
			let myChart,options;
			$.ajax({
				type:'GET',
				url:ajax_url,
				data:{id:id},
				dataType:'json',
				success:function(data){
					console.log(data);
					
					for(i=0;i<addressMonths.length;i++){
						addressMonths[i].paid = 0;
						addressMonths[i].unpaid = 0;
					}
			
					for(let i=0;i < data.length; i++){
							let mon = parseInt(data[i].data.substr(5,2));
							
								for(let m = 0; m < addressMonths.length; m++){
									if(mon == addressMonths[m].mon){
			
										//如果is_pay == 1 将moneys赋值给paid 否则赋值给unpaid
										if(data[i].is_pay == 1){
								
											addressMonths[m].paid = data[i].moneys;
										}else{
											addressMonths[m].unpaid = data[i].moneys;
										}
									}
								}
					}
					//总结数据
					let month =[],paid= [],unpaid = [];
					for(i=0;i<addressMonths.length;i++){
						month.push(addressMonths[i].mon+'月');
						paid.push(addressMonths[i].paid);
						unpaid.push(addressMonths[i].unpaid);
					}
					myChart = echarts.init(document.getElementById('modal-isPay-chart'));


					options = {
						tooltip : {
							trigger: 'axis',
							axisPointer : {            // 坐标轴指示器，坐标轴触发有效
								type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
							}
						},
						legend: {
							data:['已缴费金额','未缴费金额']
						},
						grid: {
							left: '3%',
							right: '4%',
							bottom: '3%',
							containLabel: true
						},
						xAxis : [
							{
								type : 'category',
								data : month
							}
						],
						yAxis : [
							{
								type : 'value'
							}
						],
						series : [
							{
								name:'已缴费金额',
								type:'bar',
								data:paid
							},
							{
								name:'未缴费金额',
								type:'bar',
								// stack: '广告',
								data:unpaid
							},
					
						
						]
					};
					myChart.setOption(options);
				}
			})
		}
		function currentState(id){
			// let id = id;
			let ajax_url = "{{route('ajax_household')}}";
			$.ajax({
				type:'GET',
				url:ajax_url,
				data:{id:id},
				dataType:'json',
				success:function(data){
					console.log(data);
					
					for(i=0;i<curState.length;i++){
						curState[i].state = null;
					}
			
					for(let i=0;i < data.length; i++){
							let mon = parseInt(data[i].data.substr(5,2));
							
								for(let m = 0; m < addressMonths.length; m++){
									if(mon == curState[m].mon){
			
										//如果is_pay == 1 将moneys赋值给paid 否则赋值给unpaid
										if(data[i].is_pay == 1){
								
											curState[m].state = '正常';
										}else{
											curState[m].state = '欠费';
										}
									}
								}
					}
					//总结数据
					let month ='',state= '';
					for(i=0;i<curState.length;i++){
						month += `<th>${curState[i].mon}月</th>`;
						if(curState[i].state == null){
							state += `<td></td>`;
						}else{
							state += `<td>${curState[i].state}</td>`;
						}
					
					}
					document.getElementById('state-th').innerHTML = month;
					document.getElementById('state-td').innerHTML = state;
				}
			})
		}
	</script>
@endsection
