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
<form class="form-horizontal" role="form" action="{{url('/cate/update/'.$result->cate_id)}}" method="post">
 @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$result->cate_name}}" name="cate_name" id="firstname" placeholder="请输入分类名称">
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-10">
      <select name="parent_id" id="" disabled>
      <option value="">---请选择---</option>
      @foreach ($data as $v)
      <option value="{{$v->cate_id}}"{{$result->parent_id==$v->cate_id?'selected':''}}>@php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v->level);@endphp {{$v->cate_name}}</option>
      @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
    @if($result->is_show ==1)
      <input type="radio"  name="is_show" id="firstname" value="1" checked>是
      <input type="radio"  name="is_show" id="firstname" value="2">否
    @else
    <input type="radio"  name="is_show" id="firstname" value="1">是
    <input type="radio"  name="is_show" id="firstname" value="2" checked>否
    @endif
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否导航栏显示</label>
    <div class="col-sm-10">
    @if($result->is_nov_show ==2)
    <input type="radio"  name="is_nav_show" id="firstname" value="1">是
    <input type="radio"  name="is_nav_show" id="firstname" value="2" checked>否
    @else
    <input type="radio"  name="is_nav_show" id="firstname" value="1">是
    <input type="radio"  name="is_nav_show" id="firstname" value="2" checked>否
    @endif
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