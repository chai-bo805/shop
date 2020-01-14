<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
	<!-- <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <title>Document</title>
</head>
<body>
<a href="/lian/create">员工添加</a>
<form>
<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入员工名字">
<button>搜索</button>
</form>
<table class="table table-striped">
  <caption>员工列表</caption>
  <thead>
    <tr>
      <th>员工id</th>
      <th>员工名字</th>
      <th>员工手机</th>
      <th>员工部门</th>
      <th>员工头像</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->yuanid}}</td>
      <td>{{$v->yuanname}}</td>
      <td>{{$v->yuanphone}}</td>
      <td>{{$v->yuanbu}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->yuantou}}" width="50px"></td>
      <td><a href="{{url('/lian/destroy/'.$v->yuanid)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/lian/edit/'.$v->yuanid)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="6">{{$data->appends($query)->links()}}</td>
    </tr>
  </tbody>
</table>

</body>
</html>