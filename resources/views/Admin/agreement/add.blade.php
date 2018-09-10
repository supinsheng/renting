<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
<form class="form-horizontal" action="{{route('agreement_store')}}" method="post">
{{csrf_field()}}
<h2 style="text-align:center">新建协议</h2>
  <div class="form-group">
    <label for="inputTitle" class="col-sm-2 control-label">协议标题</label>
    <div class="col-sm-9">
      <input type="text" name="title" class="form-control" id="inputTitle" placeholder="请填入协议的标题">
    </div>
  </div>
  <div class="form-group">
    <label for="content" class="col-sm-2 control-label">协议内容</label>
    <div class="col-sm-9">
      <textarea name="description" id="content" cols="30" rows="10" class="form-control" placeholder="请填入协议的内容"></textarea>
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">创建</button>
    </div>
  </div>
</form>
    <script src="/vendor/jquery/jquery.min.js"></script>
	<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/simditor-2.3.6/styles/simditor.css" />

<script type="text/javascript" src="/simditor-2.3.6/scripts/jquery.min.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/module.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/hotkeys.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/uploader.js"></script>
<script type="text/javascript" src="/simditor-2.3.6/scripts/simditor.js"></script>
<script>
    var editor = new Simditor({
        textarea: $('#content'),
  
    });
</script>
</body>
</html>