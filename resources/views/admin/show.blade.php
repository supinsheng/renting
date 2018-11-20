<!doctype html>
<html lang="en">

<head>
	<title>Typography</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/vendor/linearicons/style.css">
	<link rel="stylesheet" href="/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="/css/core.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="/css/demo.css">
	<!-- GOOGLE FONTS -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> -->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="/images/coreapple-icon.png">
	<!-- <link rel="icon" type="image/png" sizes="96x96" href="/images/core/favicon.png"> -->
	<link rel="stylesheet" href="/css/cr_table.css">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="container-fluid">
			<h3 class="page-title">住户信息</h3>
			<div class="panel panel-headline">
				<div class="panel-body">
					<p><code>姓名：</code> {{$data->realname}}</p> 
					<hr>
					<p><code>房号：</code> {{$data->village}}</p>
					<hr>
					<p class="text-muted"><code>水表号：</code>{{$data->water_meter}}</p>
					<hr>
					<p class="text-muted"><code>电表号：</code>{{$data->electric_meter}}</p>
					<hr>
					<p class="text-primary"><code>身份证号：</code> {{$data->cardId}}</p>
					<hr>
					<p class="text-success"><code>缴费标准：</code>{{$data->rent}}</p>
					<hr>
					<p class="text-info"><code>已缴：</code>{{$data->paid}}</p>
					<p class="text-warning"><code>未缴：</code>{{$data->unpaid}}</p>
				
					<hr>

				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/scripts/klorofil-common.js"></script>
</body>

</html>