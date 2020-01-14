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
<a href="/shop/create">商品添加</a>
<form>
<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入商品名称">
<button>搜索</button>
</form>
<table class="table table-striped">
  <caption>商品列表</caption>
  <thead>
    <tr>
      <th>商品id</th>
      <th>商品名称</th>
      <th>分类名称</th>
      <th>商品价格</th>
      <th>商品简介</th>
      <th>商品图片</th>
      <th>商品状态</th>
      <th>添加时间</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->goods_id}}</td>
      <td>{{$v->goods_name}}</td>
      <td>{{$v->cate_id}}</td>
      <td>{{$v->goods_price}}</td>
      <td>{{$v->goods_desc}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_picture}}" width="50px"></td>
      <td>{{$v->goods_status==1?'上架':'下架'}}</td>
      <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
      <td><a href="{{url('/shop/destroy/'.$v->goods_id)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/shop/edit/'.$v->goods_id)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="9">{{$data->appends($query)->links()}}</td>
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