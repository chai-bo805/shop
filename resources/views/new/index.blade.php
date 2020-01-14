<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
	<!-- <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script> -->
	<script src="/static/admin/js/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<form>
<input type="text" name="new_author" value="{{$query['new_author']??''}}">
<button>搜索</button>
</form>
<table class="table table-striped">
  <caption>新闻列表</caption>
  <thead>
    <tr>
      <th>新闻id</th>
      <th>新闻标题</th>
      <th>新闻分类</th>
      <th>新闻作者</th>
      <th>添加时间</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->new_id}}</td>
      <td>{{$v->new_title}}</td>
      <td>{{$v->cate_id}}</td>
      <td>{{$v->new_author}}</td>
      <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
      <td><a href="{{url('/new/destroy/'.$v->new_id)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/new/edit/'.$v->new_id)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="6">{{$data->appends($query)->links()}}</td>
    </tr>
  </tbody>
</table>
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
</body>
</html>