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
    
<form class="form-horizontal" role="form" action="{{url('/article/update/'.$data->aid)}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章标题</label>
    <div class="col-sm-10">
      <input type="text"name="atitle" value="{{$data->atitle}}" class="form-control" id="firstname" placeholder="请输入文章标题">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章分类</label>
    <div class="col-sm-10">
     <select name="acate" id="">
     <option value="">---请选择---</option>
     <option value="桃李" {{$data->acate =='桃李'?'selected':''}}>桃李</option>
     <option value="单数" {{$data->acate =='单书'?'selected':''}}>单书</option>
     <option value="芳华" {{$data->acate =='芳华'?'selected':''}}>芳华</option>
     </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">重要程度</label>
    <div class="col-sm-10">
    @if($data->azhong == 1)
      <input type="radio" name="azhong"  id="firstname" value="1"checked>普通
      <input type="radio" name="azhong"  id="firstname" value="2" >置顶
    @else
    <input type="radio" name="azhong"  id="firstname" value="1">普通
    <input type="radio" name="azhong"  id="firstname" value="2" checked>置顶
    @endif
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
    @if($data->axian ==1)
    <input type="radio" name="axian" id="firstname" value="1" checked>显示
    <input type="radio" name="axian" id="firstname" value="2">不显示
    @else
    <input type="radio" name="axian" id="firstname" value="1" >显示
    <input type="radio" name="axian" id="firstname" value="2" checked>不显示
    @endif
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章作者</label>
    <div class="col-sm-10">
      <input type="text"name="author" value="{{$data->author}}" class="form-control" id="firstname" placeholder="请输入作者姓名">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">作者email</label>
    <div class="col-sm-10">
      <input type="text"name="aemail" value="{{$data->aemail}}" class="form-control" id="firstname" placeholder="请输入email">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">关键字</label>
    <div class="col-sm-10">
      <input type="text"name="guan" value="{{$data->guan}}" class="form-control" id="firstname" placeholder="请输入关键字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">描述</label>
    <div class="col-sm-10">
      <textarea name="adesc" id="" cols="30" rows="10">{{$data->adesc}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">图片</label>
    <div class="col-sm-10">
      <img src="{{env('UPLOAD_URL')}}{{$data->picture}}" width="50px"><input type="file"name="picture" class="form-control" id="lastname">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">文章编辑</button>
    </div>
  </div>
</form>

</body>
</html>