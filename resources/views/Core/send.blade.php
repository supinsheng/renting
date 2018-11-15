@extends('Core.layouts.temp')
@section('main')
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">发布信息通知至公租房区域</h3>
					<div class="row">
                   
                                
                    <div class="col-md-1">
                    </div>
                    
						<div class="col-md-9">
							
							<!-- INPUTS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">发布信息</h3>
								</div>
                                
                                <form action="{{route('doSend_message')}}" method="post">
								<div class="panel-body">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="fa fa-check-circle"></i>  {{ session('success') }}
                                </div>
                                @endif
                                {{csrf_field()}}
									<input type="text" class="form-control" name="title" placeholder="请输入信息的标题">
									<br>
									<textarea class="form-control" name="description" placeholder="请输入信息的内容" rows="6"></textarea>
									<br>
									<select class="form-control" name="village" >
                                    @foreach($villages as $v)
										<option value="{{$v->name}}">{{$v->name}}</option>
                                    @endforeach
									</select>
									<br>
                                    @if($errors->any())
                                    @foreach($errors->all() as $e)
									<div class="alert alert-warning alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-warning"></i>{{$e}}
									</div>
                                    @endforeach
                                    @endif
									<label class="fancy-radio" style="float:right;">
                                        <button type="submit" class="btn btn-success">发布</button>
									</label>
								</div>
                                </form>
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
	<script src="/scripts/klorofil-common.js"></script>
  
@endsection