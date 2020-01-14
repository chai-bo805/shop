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
    
<form class="form-horizontal" role="form" action="{{url('/new/store')}}" method="post">
@csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">新闻标题</label>
    <div class="col-sm-10">
      <input type="text"name="new_title" class="form-control" id="firstname" placeholder="请输入新闻标题">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">新闻分类</label>
    <div class="col-sm-10">
     <select name="cate_id" id="">
     <option value="0">---请选择---</option>
     @foreach($data as $v)
     <option value="{{$v->cate_id}}">@php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v->level);@endphp {{$v->cate_name}}</option>
     @endforeach
     </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">新闻作者</label>
    <div class="col-sm-10">
      <input type="text"name="new_author" class="form-control" id="lastname" placeholder="请输入作者">
    </div>
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">新闻添加</button>
    </div>
  </div>
</form>

</body>
</html>