<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
    <title>Document</title>
</head>
<body>
    
<form class="form-horizontal" role="form" action="{{url('/lian/update/'.$data->yuanid)}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">员工姓名</label>
    <div class="col-sm-10">
      <input type="text"name="yuanname" value="{{$data->yuanname}}" class="form-control" id="firstname" placeholder="请输入姓名">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">员工手机号</label>
    <div class="col-sm-10">
      <input type="text"name="yuanphone" value="{{$data->yuanphone}}" class="form-control" id="firstname" placeholder="请输入手机号">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">部门</label>
    <div class="col-sm-10">
      <input type="text"name="yuanbu" value="{{$data->yuanbu}}" class="form-control" id="lastname" placeholder="请输入部门">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">员工头像</label>
    <div class="col-sm-10">
   <img src="{{env('UPLOAD_URL')}}{{$data->yuantou}}"><input type="file"name="yuantou"  class="form-control" id="lastname" placeholder="请输入员工头像">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">员工修改</button>
    </div>
  </div>
</form>

</body>
</html>