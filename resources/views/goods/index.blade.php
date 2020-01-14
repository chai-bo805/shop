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
<a href="/goods/add">商品添加</a>
<!-- <form>
<input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入品牌名称">
<button>搜索</button> -->
<!-- </form> -->
<table class="table table-striped">
  <caption>商品列表</caption>
  <thead>
    <tr>
      <th>商品id</th>
      <th>商品名称</th>
      <th>商品分类</th>
      <th>商品品牌</th>
      <th>商品价格</th>
      <th>商品图片</th>
      <th>商品相册</th>
      <th>商品简介</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->goods_id}}</td>
      <td>{{$v->goods_name}}</td>
      <td>{{$v->cate_name}}</td>
      <td>{{$v->brand_name}}</td>
      <td>{{$v->goods_price}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_picture}}" width="50px"></td>
      <td>
      @if($v->goods_imgs)
      @foreach ($v->goods_imgs as $vv)
      <img src="{{env('UPLOAD_URL')}}{{$vv}}" width="50px">
      @endforeach
      @endif
      </td>
      <td>{{$v->goods_desc}}</td>
      <td><a href="javascript:void(0)" onclick="ajaxdel({{$v->goods_id}})" class="btn btn-info">删除按钮</a>|<a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="9">{{$data->links()}}</td>
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
function ajaxdel(id){
    if(!id){
        alert('请选择删除对象');
        return;
    }
    $.get('/goods/destroy/'+id,function(res){
        if(res.code=='00000'){
            alert(res.msg);
            location.reload();
        }
    },'json');
}
</script>
</html>