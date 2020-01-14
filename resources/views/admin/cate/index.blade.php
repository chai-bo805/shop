<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
	<!-- <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="/static/admin/js/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<a href="/cate/create">分类添加</a>
<table class="table table-striped">
  <caption>分类列表</caption>
  <thead>
    <tr>
      <th>分类id</th>
      <th>分类名称</th>
      <th>父级分类</th>
      <th>是否显示</th>
      <th>是否在导航栏显示</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->cate_id}}</td>
      <td>{{$v->cate_name}}</td>
      <td>{{$v->parent_id}}</td>
      <td>@if($v->is_show == 1)√@else×@endif</td>
      <td>@if($v->is_nov_show == 1)√@else×@endif</td>
      <td><a href="{{url('/cate/destroy/'.$v->cate_id)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/cate/edit/'.$v->cate_id)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
  </tbody>
</table>
</body>
</html>