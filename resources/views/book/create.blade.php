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
<form class="form-horizontal" role="form" action="{{url('/book/store')}}" method="post"enctype="multipart/form-data">
 @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="book_name" id="firstname" placeholder="请输入名称">
      <b style="color:red">{{$errors->first('brand_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书作者</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="book_author" id="firstname" placeholder="请输入作者名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书售价</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="book_price" id="firstname" placeholder="请输入售价">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书封面</label>
    <div class="col-sm-10">
    <input type="file" class="form-control" name="book_cover" id="firstname" placeholder="请输入封面"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">图书添加</button>
    </div>
  </div>
</form>

</body>
</html>