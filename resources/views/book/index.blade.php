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
<h3>欢迎【{{session('admin')->name}}】登录 <a href="/login/logout">退出</a></h3>
<a href="/book/create">图书添加</a>
<form>
<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入图书名称">
<button>搜索</button>
</form>
<table class="table table-striped">
  <caption>图书列表</caption>
  <thead>
    <tr>
      <th>图书id</th>
      <th>图书名称</th>
      <th>图书作者</th>
      <th>图书价格</th>
      <th>图书封面</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->book_id}}</td>
      <td>{{$v->book_name}}</td>
      <td>{{$v->book_author}}</td>
      <td>{{$v->book_price}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->book_cover}}" width="50px"></td>
      <td><a href="{{url('/book/destroy/'.$v->book_id)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/book/edit/'.$v->book_id)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="6">{{$data->appends($query)->links()}}</td>
    </tr>
  </tbody>
</table>
</body>
<script>
$(document).on('click','.pagination a',function(){
    var url=$(this).attr('href');
    $.get(url,function(res){
        $('tbody').html(res);
    });
    return false;
});
</script>
</html>