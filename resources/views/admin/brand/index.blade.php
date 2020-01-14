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
<a href="/create">品牌添加</a>
<form>
<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入品牌名称">
<button>搜索</button>
</form>
<table class="table table-striped">
  <caption>品牌列表</caption>
  <thead>
    <tr>
      <th>品牌id</th>
      <th>品牌名称</th>
      <th>品牌网址</th>
      <th>品牌标志</th>
      <th>品牌简介</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->brand_id}}</td>
      <td>{{$v->brand_name}}</td>
      <td>{{$v->brand_url}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}" width="50ox"></td>
      <td>{{$v->brand_desc}}</td>
      <td><a href="{{url('/destroy/'.$v->brand_id)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/edit/'.$v->brand_id)}}" class="btn btn-success">编辑按钮</a></td>
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
      //alert(res);
      $('tbody').html(res);
    });
    return false;
});
</script>
</html>