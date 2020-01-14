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
    
<form class="form-horizontal" role="form" action="{{url('store')}}" method="post">
@csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
      <input type="text"name="studentname" class="form-control" id="firstname" placeholder="请输入姓名">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10">
      <input type="text"name="studentsex" class="form-control" id="firstname" placeholder="请输入性别">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">班级</label>
    <div class="col-sm-10">
      <input type="text"name="studentban" class="form-control" id="lastname" placeholder="请输入班级">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">学生添加</button>
    </div>
  </div>
</form>

</body>
</html>