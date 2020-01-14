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
<form class="form-horizontal" role="form" action="{{url('/feng/store')}}" method="post"enctype="multipart/form-data">
 @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">楼盘名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="louname" id="firstname" placeholder="请输入名称">
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">地理位置</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="location" id="firstname" placeholder="请输入名称">
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">面积</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="mian" id="firstname" placeholder="请输入名称">
      <b style="color:red">{{$errors->first('brand_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">导购员</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="dao" id="firstname" placeholder="请输入作者名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">联系电话</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="phone" id="firstname" placeholder="请输入联系电话">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">楼盘主图</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="picture" id="firstname" placeholder="请输入名称">
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">楼盘相册</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" multiple="multiple" name="imgs[]" id="firstname" placeholder="请输入封面"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">楼盘添加</button>
    </div>
  </div>
</form>

</body>
</html>