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
				<div style="float:right;padding-right: 15px;">
				<!-- <button type="button" class="btn btn-info btn-toastr"  >新建</button> -->
				<button type="button" class="btn btn-default"  data-toggle="modal" data-target="#addCelue" data-whatever="@mdo">
					<i class="fa fa-plus-square"></i> 新建 </button>
				</div>
				<div class="container-fluid">
					<h3 class="page-title">催费策略列表</h3>
					<div id="toastr-demo" class="panel">
						<div class="defaultTab-T">
							<table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
								<tbody><tr>
									<th class="t_1">编号</th>
									<th class="t_2_1">活动标题</th>
									<th class="t_3">创建时间</th>
									<!-- <th class="t_5">描述</th> -->
									<th class="t_4">操作</th></tr>
							</tbody></table>
						</div>
						<table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
							<tbody>
							@foreach($data as $k=>$d)
							<tr>
								<td class="t_1">{{$d->id}}</td>
								<td class="t_2_1">{{$d->title}}</td>
								<td class="t_3">{{str_limit($d->created_at,10,'')}}</td>
								<!-- <td class="t_5">本站原创
								</button>
								</td> -->
								<td class="t_4">
								
									<div class="cr-btn">
									@if($d->is_release=='1') 
									<a href="javascript:;" class="btn btn-default"  style="color:#000;" >已发布</a>
									@else
									<a  onClick="release({{$k}})" class="Top" data-toggle="modal" data-target="#release" data-whatever="@mdo2">发布</a>
									  @endif 
									<a href="#" class="modify" onClick="edit({{$k}})" data-toggle="modal" data-target="#updateCelue" data-whatever="@mdo1">编辑</a>
									<a onclick="return confirm('确定要删除吗？')" href="{{route('del_celue',['id'=>$d->id])}}"  class="delete">删除</a></div>
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
					<input type="hidden"  name="username" value="">
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
	<form action="{{route('edit_celue')}}" method="post" id="form1">
      <div class="modal fade" id="updateCelue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">编辑策略</h4>
            </div>
            <div class="modal-body">
	
				<div class="panel-body">
					{{csrf_field()}}
					<input type="text" id="edit-title" name="title" class="form-control" placeholder="请输入新策略的标题">
					<br>
					<textarea class="form-control" id="edit-desc" name="description" placeholder="请输入策略的内容" rows="6"></textarea>
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
	<form action="{{route('release_celue')}}" method="post" id="form2">
      <div class="modal fade" id="release" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">发布策略</h4>
            </div>
            <div class="modal-body">
	
				<div class="panel-body">
				{{csrf_field()}}
					<input type="text" id="release-title"  name="title" class="form-control" placeholder="请输入新策略的标题"  disabled>
					<br>
					<textarea class="form-control" id="release-desc" name="description" placeholder="请输入策略的内容" rows="6"  disabled></textarea>
					<br>
					<input type="hidden" id="release-id" name="id" value="">
				</div>				
			</div>
			<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
              <button type="submit" class="btn btn-primary">确认发布</button>
            </div>
          </div>
        </div>
      </div>
    </form>
	<!-- Javascript -->
	<script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/vendor/toastr/toastr.min.js"></script>
	<!-- <script src="/scripts/klorofil-common.js"></script> -->
	<script>
	console.log('{{Route::currentRouteName()}}');
		function edit(k){
			let str = '{{$data}}';
			s1=str.replace(/&quot;/g,'"');//将&quot; 转义为空
			let s2 = JSON.parse(s1);
			let title = s2[k].title;
			let desc = s2[k].description;
			let id = s2[k].id;
			// console.log(id);
			// console.log(title,desc);
			// document.getElementById('标签id').innerText= '要修改的文本内容';
			document.getElementById('edit-title').value = title;
			document.getElementById('edit-desc').innerText = desc;
			document.getElementById('edit-id').value = id;
			
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
@endsection
