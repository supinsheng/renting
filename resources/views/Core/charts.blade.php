@extends('Core.layouts.temp')
@section('main')
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">近7月的数据显示</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="panel" >
								<div class="panel-heading">
									<select class="form-control" style="width: 240px;" id="village-select"  onChange="villageChart(this.value)">
									</select>
								</div>
								<div class="panel-body" id="echart-1" style="width:100%;height:400px">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">所有公租房的近7个月的缴费情况</h3>
								</div>
								<div class="panel-body" id="echart-months" style="width:100%;height:400px">
									
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
								<select class="form-control" style="width: 240px;" id="address-select"  onChange="addressChart(this.value)">
									</select>
								</div>
								<div class="panel-body"  id="echart-address" style="width:100%;height:400px">
				
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
								<select class="form-control" style="width: 240px;" id="village-month-select"  onChange="villageChange(this.value)">
									</select>
								</div>
								<div class="panel-body" id="village-month-chart" style="width:100%;height:400px">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/vendor/chartist/js/chartist.min.js"></script>
	<script src="/scripts/klorofil-common.js"></script>
	<script src="/js/echarts.min.js"></script>
	<script>
		function quot(str){
			s1=str.replace(/&quot;/g,'"');
			return JSON.parse(s1)
		}
		let arr = quot("{{$data}}");

		console.log(arr);
		//输出所有的区域
		let villages = quot("{{$villages}}");
		let villagesList = [];
		for(let i = 0;i< villages.length;i++){
			villagesList.push({'name':villages[i].name.trim(),'paid':0,'unpaid':0});
		}
		// console.log(villagesList);
		var date   = new Date();
 		var monthn = date.getMonth()+1;
		// date.setMonth(date.getMonth()-5);
		//获取前6个月，然后定义一个数组，[1, 2, 3, 4, 5, 6, 7]
		var date1 = new Date();
		date1.setMonth(date1.getMonth()-6); 
		var start_month=date1.getMonth()+1;
		let months = [],addressMonths = [];

		for(i=start_month;i<=monthn;i++){
			months.push({'mon':i,'paid':0,'unpaid':0,'village':[]});
			//定义每一个出租房的月份
			addressMonths.push({'mon':i,'paid':0,'unpaid':0})
		}
		for(i = 0; i < months.length; i++){
			for(let j = 0;j< villages.length;j++){
				months[i].village.push({'name':villages[j].name.trim(),'paid':0,'unpaid':0});
			}

		}

		let htmlMonth = '';
		//操作数据，总结出月份 区域 缴费情况
		for(i = 0; i< arr.length; i++){
			let ai = arr[i];
			console.log(arr[i].data);
			let mon = parseInt(arr[i].data.substr(5,2));
			// console.log(mon);
			for(j=0;j<months.length;j++){
				// console.log(mon, months[j].mon);
				if(mon == months[j].mon){
					// console.log(mon, months[j].mon);
					let vi =  months[j].village;
					for(let m=0;m<vi.length;m++){
						if(arr[i].village.trim() == vi[m].name){
							// console.log(arr[i].is_pay);
							if(arr[i].is_pay == 1){
								
								vi[m].paid += arr[i].moneys;
							}else{
								vi[m].unpaid += arr[i].moneys;
							}
						}
					}
					//统计所有公租房每个月的缴费情况，以柱前图显示
					if(arr[i].is_pay == 1){				
						months[j].paid += arr[i].moneys;
					}else{
						months[j].unpaid += arr[i].moneys;
					}
				}
				
			}
		}
		let monthsL = [],paid = [],unpaid = [];
		for(i = 0; i < months.length; i++){
			let monj =  months[i].mon;
			//定义select 的 html
			if(monj == monthn){
				htmlMonth += `<option value="${monj}" selected>${monj}月份区域缴费情况</option>`;
			}else{
				htmlMonth += `<option value="${monj}">${monj}月份区域缴费情况</option>`;

			}
			monthsL.push(monj+'月');
			paid.push(months[i].paid);
			unpaid.push(months[i].unpaid);
		}
		document.getElementById('village-select').innerHTML = htmlMonth;
		// document.getElementById('month-select').innerHTML = monthSelect;
		let vills = [];
		for(i = 0;i < villages.length;i++){
			vills.push(villages[i].name.trim());
		}
		var options,myChart;
		function villageChart(mon){
			// let index = 0;
			let paid= [],unpaid = [];
			for(let i=0;i < months.length; i++){
				if(months[i].mon == mon){
					let dataArr = months[i].village;
					for(let j = 0; j< months[i].village.length;j++){
						// console.log( months[i].village.pad)
						paid.push(months[i].village[j].paid);
						unpaid.push(months[i].village[j].unpaid);
					}
				}
			}
			
			myChart = echarts.init(document.getElementById('echart-1'))
	

			// app.title = '堆叠柱状图';

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
						data : vills
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
					// {
					// 	name:'未缴费人数',
					// 	type:'bar',
					// 	// stack: '搜索引擎',
					// 	data:[1, 2, 33, 4, 10,]
					// },
					// {
					// 	name:'已缴费人数',
					// 	type:'bar',
					// 	// stack: '搜索引擎',
					// 	data:[1, 2, 33, 4, 10,]
					// }
				
				]
			};
			myChart.setOption(options);
		}
		villageChart(monthn);



		// console.log(months);
		let map = {}, dest= [];
		for(i=0;i<arr.length;i++){
			let ai = arr[i];
			let ress = ai.address;
			let mon = parseInt(ai.data.substr(5,2));
			// console.log(ars);
			// if(dest)
			// dest.push({
			// 	address:ress,
			// 	month:addressMonths
			// })
			if(!map[ress]){
				if(ai.is_pay == 1){
					dest.push({
						address:ress,
						month:[{'mon':mon,'paid':ai.moneys,'unpaid':0}]
					});
				}else if(ai.is_pay ==0){
					dest.push({
						address:ress,
						month:[{'mon':mon,'paid':0,'unpaid':ai.moneys}]
					});
				}
				
				map[ress] = [ress];
			}else{
				for(j = 0; j < dest.length; j++){
					let dj = dest[j];
					if(dj.address == ress) {
						//1. 判断village中是否存在这个小区 
						// 存在 +1 不存在追加
						// dj.village.push({'name':ai.village,'num':1});
						// for(let m = 0;m < dj.month.length; m++){

							if(ai.is_pay == 1){
								dj.month.push({'mon':mon,'paid':ai.moneys,'unpaid':0});
							}else if(ai.is_pay == 0){
								dj.month.push({'mon':mon,'paid':0,'unpaid':ai.moneys});
							}
						// }
						// break;
					}
					
				}
			}
			
		}
		let addrSelect = '';
		for(i=0;i<dest.length;i++){
			ress = dest[i].address;
			// if(monj == monthn){
			// 	addrSelect += `<option value="${monj}" selected>${monj}月份区域缴费情况</option>`;
			// }else{
				addrSelect += `<option value="${ress}">${ress}每个月缴费情况</option>`;

			// }
		}
		// console.log(addrSelect);
		document.getElementById('address-select').innerHTML = addrSelect;

		// console.log(addressMonths);
		// console.log(monthsL);
		// 统计某个公租房每月的缴费情况，以柱前图显示
		function addressChart(address){

			for(i=0;i<addressMonths.length;i++){
				addressMonths[i].paid = 0;
				addressMonths[i].unpaid = 0;
			}
	
			// let index = 0;
			for(let i=0;i < dest.length; i++){
				ress = dest[i].address;
				// console.log(ress,address);
				if(ress == address){
					// console.log('11fasdf111');
					let dataArr = dest[i].month;
					for(let j = 0; j< dataArr.length;j++){
						// console.log(dataArr[j],1111);
						// console.log( months[i].village.pad)
						// paid.push(months[i].village[j].paid);
						// unpaid.push(months[i].village[j].unpaid);
						for(let m = 0; m < addressMonths.length; m++){
							if(dataArr[j].mon == addressMonths[m].mon){
								addressMonths[m].paid = dataArr[j].paid;
								addressMonths[m].unpaid = dataArr[j].unpaid;

							}
						}
					}
				}
			}
			let month =[],paid= [],unpaid = [];
			for(i=0;i<addressMonths.length;i++){
				month.push(addressMonths[i].mon+'月');
				paid.push(addressMonths[i].paid);
				unpaid.push(addressMonths[i].unpaid);
			}
			// console.log(month,paid,unpaid);
			myChart = echarts.init(document.getElementById('echart-address'));
	

			// app.title = '堆叠柱状图';

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
					// {
					// 	name:'未缴费人数',
					// 	type:'bar',
					// 	// stack: '搜索引擎',
					// 	data:[1, 2, 33, 4, 10,]
					// },
					// {
					// 	name:'已缴费人数',
					// 	type:'bar',
					// 	// stack: '搜索引擎',
					// 	data:[1, 2, 33, 4, 10,]
					// }
				
				]
			};
			myChart.setOption(options);
		}
		addressChart(dest[0].address);


		// 按某个区统计用户缴费数据，以列表显示
		// 统计某个区域每个月的缴费情况，以柱状图显示
		let map1 = {}, dest1= [];
		for(i=0;i<arr.length;i++){
			let ai = arr[i];
			let vill = ai.village.trim();
			let mon = parseInt(ai.data.substr(5,2));
			if(!map1[vill]){
				if(ai.is_pay == 1){
					dest1.push({
						village:vill,
						month:[{'mon':mon,'paid':ai.moneys,'unpaid':0}]
					});
				}else if(ai.is_pay ==0){
					dest1.push({
						village:vill,
						month:[{'mon':mon,'paid':0,'unpaid':ai.moneys}]
					});
				}
				
				map1[vill] = [vill];
			}else{
				for(j = 0; j < dest1.length; j++){
					let dj = dest1[j];
					if(dj.village == vill) {
						if(ai.is_pay == 1){
							dj.month.push({'mon':mon,'paid':ai.moneys,'unpaid':0});
						}else if(ai.is_pay == 0){
							dj.month.push({'mon':mon,'paid':0,'unpaid':ai.moneys});
						}
				
					}
					
				}
			}
			
		}
		let villageSelect = '';
		for(i=0;i<dest1.length;i++){
			let vill = dest1[i].village;
		
			villageSelect += `<option value="${vill}">${vill}的缴费情况</option>`;

		}
		document.getElementById('village-month-select').innerHTML = villageSelect;
		function villageChange(village){
			for(i=0;i<addressMonths.length;i++){
				addressMonths[i].paid = 0;
				addressMonths[i].unpaid = 0;
			}
			for(let i=0;i < dest1.length; i++){
				vill = dest1[i].village;
				
				if(vill == village){
			
					let dataArr = dest1[i].month;
					for(let j = 0; j< dataArr.length;j++){
						for(let m = 0; m < addressMonths.length; m++){
							if(dataArr[j].mon == addressMonths[m].mon){
								addressMonths[m].paid += dataArr[j].paid;
								addressMonths[m].unpaid += dataArr[j].unpaid;

							}
						}
					}
				}
			}
			//总结数据 x轴数组 已缴费数据 未交费数据
			let month =[],paid= [],unpaid = [];
			for(i=0;i<addressMonths.length;i++){
				month.push(addressMonths[i].mon+'月');
				paid.push(addressMonths[i].paid);
				unpaid.push(addressMonths[i].unpaid);
			}
			// console.log(month,paid,unpaid);
			myChart = echarts.init(document.getElementById('village-month-chart'));


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
		villageChange(dest1[0].village);


		// 统计所有公租房每个月的缴费情况，以柱前图显示
		myChart = echarts.init(document.getElementById('echart-months'))
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
					data : monthsL
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
				// {
				// 	name:'未缴费人数',
				// 	type:'bar',
				// 	// stack: '搜索引擎',
				// 	data:[1, 2, 33, 4, 10,]
				// },
				// {
				// 	name:'已缴费人数',
				// 	type:'bar',
				// 	// stack: '搜索引擎',
				// 	data:[1, 2, 33, 4, 10,]
				// }
			
			]
		};
		myChart.setOption(options);
	
	</script>
@endsection