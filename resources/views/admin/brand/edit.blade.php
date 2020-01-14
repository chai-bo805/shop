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
<form class="form-horizontal" role="form" action="{{url('/update/'.$data->brand_id)}}" method="post">
 @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->brand_name}}" name="brand_name" id="firstname" placeholder="请输入名称">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌网址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data->brand_url}}" name="brand_url" id="firstname" placeholder="请输入网址">
    </div>
  </div>
  <!-- <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌LOGO</label>
    <div class="col-sm-10">
      <input type="file" class="form-control"name="brand_logo" id="firstname" placeholder="请输入图片">
    </div>
  </div> -->
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌简介</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="firstname" name="brand_desc" placeholder="请输入简介">{{$data->brand_desc}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">编辑</button>
    </div>
  </div>
</form>

</body>
</html>