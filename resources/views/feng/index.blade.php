<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.min.js"></script> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>Document</title>
</head>
<body>
    <a href="{{url('/feng/create')}}">楼盘添加</a>
<table class="table table-striped">
  <caption>文章列表</caption>
  <thead>
    <tr>
      <th>楼盘id</th>
      <th>楼盘名称</th>
      <th>位置</th>
      <th>面积</th>
      <th>导购员</th>
      <th>联系手机</th>
      <th>楼盘主图</th>
      <th>楼盘相册</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->louid}}</td>
      <td>{{$v->louname}}</td>
      <td>{{$v->location}}</td>
      <td>{{$v->mian}}</td>
      <td>{{$v->dao}}</td>
      <td>{{$v->phone}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->picture}}" width="50px"></td>
      <td>
      @if($v->imgs)
      @foreach ($v->imgs as $vv)
      <img src="{{env('UPLOAD_URL')}}{{$vv}}" width="50px">
      @endforeach
      @endif
      </td>
      <td><a href="{{url('/feng/info/'.$v->louid)}}"  class="btn btn-info">预览按钮</a>|<a href="javascipt:void(0)" onclick="ajaxdel({{$v->louid}})" class="btn btn-info">删除按钮</a>|<a href="{{url('/feng/edit/'.$v->louid)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="9">{{$data->links()}}</td>
    </tr>
  </tbody>
</table>
<script>
  function ajaxdel(id){
     if(!id){
         alert('请选择您要删除的id');
         return;
     }
    $.get('/feng/destroy/'+id,function(res){
      if(res.code=='00000'){
        alert(res.msg);
        location.reload();
      }
    },'json');
  }
</script>
</body>
</html>