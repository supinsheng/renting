@extends('Core.layouts.temp')
@section('main')
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">统计所有公租房每个月的出租数量</h3>
							<p class="panel-subtitle">日期: {{$start}} - {{$end}}</p>
						</div>
						<div class="panel-body">
							<!-- <div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download"></i></span>
										<p>
											<span class="number">1000次</span>
											<span class="title">下载</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number">203</span>
											<span class="title">销售</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number">274,678次</span>
											<span class="title">访问</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-bar-chart"></i></span>
										<p>
											<span class="number">35%的</span>
											<span class="title">转换次数</span>
										</p>
									</div>
								</div>
							</div> -->
							<div class="row">
								<div class="col-md-9">
									<div id="headline-chart" class="" style="width: 700px;height:400px"></div>
								</div>
								<div class="col-md-3">
									<div class="weekly-summary text-right">
										<span class="number">{{$total_chuzu}}</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> </span>
										<span class="info-label">总出租量</span>
									</div>
									<div class="weekly-summary text-right">
										<span class="number" id="num-avg"></span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> </span>
										<span class="info-label">平均每月出租</span>
									</div> 
									<!-- <div class="weekly-summary text-right">
										<span class="number">$65,938</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> 8%</span>
										<span class="info-label">总收入</span>
									</div>  -->
								</div>
							</div>
						</div>
					</div>
			
					<!-- END OVERVIEW -->
					<div class="row">
					
						<div class="col-md-8">
							<!-- MULTI CHARTS -->
							<div class="panel">
								<div class="panel-heading">
									<select class="form-control" style="width: 240px;" id="form-select"  onChange="villageChange(this.value)">
									</select>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<div id="visits-trends-chart" class="ct-chart" style="width:450px;height: 350px"></div>
								</div>
								</div>
							</div>
							<!-- END MULTI CHARTS -->
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-9" style="margin-left:15px"> 
							<!-- TODO LIST -->
							<div class="panel">
								<div class="panel-heading">
									<select class="form-control" style="width: 200px;" id="village-select"  onChange="villageEchart(this.value)">
									</select>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body" id="village-mon-table" style="width: 700px;height:400px">
									
								</div>
							</div>
							<!-- END TODO LIST -->
						</div>
								<!-- END TIMELINE -->
					</div>
				
					
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Copyright &copy; 2017.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
				
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="/vendor/chartist/js/chartist.min.js"></script>
	<script src="/scripts/klorofil-common.js"></script>
	<script src="/js/echarts.min.js"></script>
	<script>
	var data, options;
		function quot(str){
			s1=str.replace(/&quot;/g,'"');
			return JSON.parse(s1)
		}
		// let str = '{{$data}}';
		// console.log(str);
		// s1=str.replace(/&quot;/g,'"');//将&quot; 转义为空
		let arr =quot('{{$data}}')

		let map = {}, dest= [];
		for(let i=0;i<arr.length;i++){
			let ai = arr[i];
			let mon = parseInt(ai.start.substr(5,2));
			if(!map[mon]){
				dest.push({
					mon:mon,
					num:1,
					village:[{'name':ai.village.trim(),'num':1}]
				});
				map[mon] = [mon,ai.village.trim()];
			}else{
				for(let j = 0; j < dest.length; j++){
					let dj = dest[j];
					
					if(dj.mon == mon) {
						dj.num ++;
						//1. 判断village中是否存在这个小区 
						// 存在 +1 不存在追加
						// dj.village.push({'name':ai.village,'num':1});
						for(let m = 0;m < dj.village.length; m++){
							// console.log(ai.village,dj.village[m].name,mon);
							
							// let vi = dest.village[m];
							if(ai.village.trim()  == dj.village[m].name){
								dj.village[m].num++;
								break;
							}else{
								dj.village.push({'name':ai.village.trim(),'num':1});
								break;
							}
						}
						break;
					}
					
				}
			}
		}
		let map1 = {}, dest1= [];
		for(let i=0;i<arr.length;i++){
			let ai = arr[i];
			//主要：区域 次要：月份 数量
			/*
				[
					{'name':'草桥',data:[
						{'mon':1,'num':0},
						{'mon':2,'num':0},
						{'mon':3,'num':0},
						{'mon':4,'num':0}
					]}
				]
			 */
			let mon = parseInt(ai.start.substr(5,2));
			let vill = ai.village.trim();
			if(!map1[vill]){
				dest1.push({
					village:vill,
					month:[{'mon':mon,'num':1}]
				});
				map1[vill] = [vill];
			}else{
				for(let j = 0; j < dest1.length; j++){
					let dj = dest1[j];
					if(dj.village == vill) {
						//1. 判断village中是否存在这个小区 
						// 存在 +1 不存在追加
						// dj.village.push({'name':ai.village,'num':1});
						for(let m = 0;m < dj.month.length; m++){
							// console.log(ai.village,dj.village[m].name,mon);
							
							// let vi = dest.village[m];
							if(mon  == dj.month[m].mon){
								dj.month[m].num++;
								break;
							}else{
								dj.month.push({'mon':mon,'num':1});
								break;
							}
						}
						break;
					}
					
				}
			}
		}
		function compart(pro){
			return function(a,b){
				var value1 =a[pro];
				var value2 = b[pro];
				return value1 - value2;
			}
		}
		
		dest.sort(compart('mon'));
		// console.log(dest);
		let month = [],num = [];
		for(let i = 0;i < dest.length; i++){
			month.push( dest[i].mon );
			num.push( dest[i].num );
		}
		console.log(month);
		let htmlMonth = '';
		// doument.querySelector(符合css选择器规则的元素)
		// console.log(htmlMonth);
		var date   = new Date();
 		var monthn = date.getMonth()+1;
		// date.setMonth(date.getMonth()-5);
		//获取前6个月，然后定义一个数组，[1, 2, 3, 4, 5, 6, 7]
		var date1 = new Date();
		date1.setMonth(date1.getMonth()-6); 
		var start_month=date1.getMonth()+1;
		let months = [];
		for(i=start_month;i<=monthn;i++){
			months.push({'mon':i,'num':0});
		}

		for(let i = 0;i < months.length; i++){
			if(month[i] == monthn){
				htmlMonth += `<option value="${month[i]}" selected>${month[i]}月份区域出租量</option>`;
			}else{
				htmlMonth += `<option value="${month[i]}">${month[i]}月份区域出租量</option>`;
			}
		}
		// console.log(htmlMonth);
		document.getElementById('form-select').innerHTML = htmlMonth;
		let villages = quot('{{$villages}}');
		let villages1 = [];
		for(let i = 0;i< villages.length;i++){
			villages1.push({'name':villages[i].name.trim(),'num':0});
		}
	// console.log(dest[4].village);
		for(let i = 0; i< dest[4].village.length;i++){
			for(let j = 0; j <villages1.length; j++){
				if(dest[4].village[i].name == villages1[j].name){
					villages1[j].num = dest[4].village[i].num;
					// console.log(1);
					break;
				}
			}
		}
		// console.log(dest);
		//平均每月出租量
		let numAvg = 0
		for(let i = 0; i < dest.length; i++){
			numAvg += dest[i].num;
		}
		numAvg = Math.ceil(numAvg / dest.length)
		document.getElementById('num-avg').innerText = numAvg;

		// console.log(villages1);
		let villageName = [],villageNum = [];
		for(let i = 0; i < villages1.length; i++){
			villageName.push(villages1[i].name);
			villageNum.push(villages1[i].num);
		}
		let htmlVillage = '';
		for(let i = 0;i < villageName.length; i++){
			if(i == 0){
				htmlVillage += `<option value="${villageName[i]}" selected>${villageName[i]}每月出租量</option>`;
			}else{
				htmlVillage += `<option value="${villageName[i]}">${villageName[i]}每月出租量</option>`;
			}
		}
		document.getElementById('village-select').innerHTML = htmlVillage;
		function villageChange(mon){
			console.log(mon);
			let index = 0;
			for(let i=0;i < dest.length; i++){
				if(dest[i].mon == mon){
					index = i;
					break;
				}
			}
			// console.log(index);
			// let villages1 = villages1;
			// console.log(villages1)
			for(let i = 0;i< villages1.length;i++){
				villages1[i].num = 0;
			}
		
			// console.log(villages1);
			for(let i = 0; i< dest[index].village.length;i++){
				for(let j = 0; j <villages1.length; j++){
					if(dest[index].village[i].name == villages1[j].name){
						villages1[j].num = dest[index].village[i].num;
						break;
					}
				}
			}
			let villageNum = [];
			for(let i = 0; i < villages1.length; i++){
				// villageName.push(villages1[i].name);
				villageNum.push(villages1[i].num);
			}
			var myChart1 = echarts.init(document.getElementById('visits-trends-chart'));
			var option1 = {
				title: {
					text: '区域某月的出租数量'
				},
				tooltip: {
					trigger: 'axis'
				},
				legend: {
					data:['出租数量','联盟广告','视频广告','直接访问','搜索引擎']
				},
				grid: {
					left: '5%',
					right: '4%',
					bottom: '3%',
					containLabel: true
				},
				xAxis: {
					type: 'category',
					boundaryGap: false,
					data: villageName
				},
				yAxis: {
					type: 'value'
				},
				series: [
					{
						name:'出租数量',
						type:'line',
						stack: '总量',
						data:villageNum
					},
			
				]
			};
			myChart1.setOption(option1);
		}
		villageChange(monthn);
		//统计某个区域内每个月的出租数量或比例，以柱前图显示
		function villageEchart(key){
			// data 所选中的区域
			//dest1.month  存放月份
			//months 月份数组
			let index = 0;
			let dataArr = dest1;//当前函数所使用的dest数组
			for(let i=0;i < dest.length; i++){
				if(dataArr[i].village == key){
					index = i;
					break;
				}
			}
			// vill
			// console.log(index);
			// let villages1 = villages1;
			// console.log(villages1)
			for(let i = 0;i< months.length;i++){
				months[i].num = 0;
			}
		
			// console.log(villages1);
			let de = dataArr[index].month;
			// 如果dest1中的month 下的mon 月份等于 months中的mon 月份 ,就让dest1的num 赋值给months
			for(let i = 0; i< de.length;i++){
				for(let j = 0; j <months.length; j++){
					if(de[i].mon == months[j].mon){
						months[j].num =de[i].num;
						break;
					}
				}
			}

			let monthNum = [],monthName = [];
			for(let i = 0; i < months.length; i++){
				monthName.push(months[i].mon+'月');
				monthNum.push(months[i].num);
			}
			console.log(monthNum);
			// 图表
			var myChart3 = echarts.init(document.getElementById('village-mon-table'));
			var option3 = {
				title: {
					text: '区域近7个月的出租数量'
				},
				color: ['#00a0f0'],
				tooltip : {
					trigger: 'axis',
					axisPointer : {            // 坐标轴指示器，坐标轴触发有效
						type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
					}
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
						data : monthName,
						axisTick: {
							alignWithLabel: true
						}
					}
				],
				yAxis : [
					{
						type : 'value'
					}
				],
				series : [
					{
						name:'出租数量',
						type:'bar',
						barWidth: '60%',
						data:monthNum
					}
				]
			};
			myChart3.setOption(option3);
		}
		villageEchart(villageName[0]);
		console.log(dest);



		// 统计所有公租房每个月的出租数量
		var myChart = echarts.init(document.getElementById('headline-chart'));
		var option =  {
			color: ['#3398DB'],
			title: {
                text: '近7月的房屋出租数量'
            },
            tooltip: {},
            legend: {
                data:['出租数量']
            },
            xAxis: {
                data: month
            },
            yAxis: {},
            series: [{
                name: '出租数量',
                type: 'bar',
                data: num
            }]
		};
		myChart.setOption(option);
	</script>
@endsection