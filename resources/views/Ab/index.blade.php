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
    <a href="{{url('/create')}}">学生添加</a>
    <form>
    <input type="text" name="word"value="{{$query['word']??''}}" placeholder="请输入学生姓名">
    <button>搜索</button>
    </form>
<table class="table table-striped">
  <caption>学生列表</caption>
  <thead>
    <tr>
      <th>学生id</th>
      <th>学生姓名</th>
      <th>学生性别</th>
      <th>学生班级</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->studentid}}</td>
      <td>{{$v->studentname}}</td>
      <td>{{$v->studentsex}}</td>
      <td>{{$v->studentban}}</td>
      <td><a href="{{url('/destroy/'.$v->studentid)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/edit/'.$v->studentid)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="5">{{$data->appends($query)->links()}}</td>
    </tr>
  </tbody>
</table>

</body>
</html>