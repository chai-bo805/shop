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
<!-- @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif -->

<form class="form-horizontal" role="form" action="{{url('/login/store')}}" method="post">
 @csrf
 <b style="color:red">{{session('msg')}}</b>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">用户名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="firstname" placeholder="请输入用户名称">
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">用户密码</label>
    <div class="col-sm-10">
    <input type="password" class="form-control" name="password" id="firstname" placeholder="请输入用户密码">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">登录</button>
    </div>
  </div>
</form>

</body>
</html>