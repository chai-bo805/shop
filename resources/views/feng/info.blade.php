<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
<h3>浏览数量:{{$number}}</h3>
<table class="table table-striped">
  <caption>商品详情</caption>
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
    <tr>
      <td>{{$data->louid}}</td>
      <td>{{$data->louname}}</td>
      <td>{{$data->location}}</td>
      <td>{{$data->mian}}</td>
      <td>{{$data->dao}}</td>
      <td>{{$data->phone}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$data->picture}}" width="50px"></td>
      <td>
      @if($data->imgs)
      @foreach ($data->imgs as $vv)
      <img src="{{env('UPLOAD_URL')}}{{$vv}}" width="50px">
      @endforeach
      @endif
      </td>
      <td><button type="button" class="btn btn-success">购买</button></td>
    </tr>
  </tbody>
</table>
</body>
<script>
$('button').click(function(){
 var  louid={{$data->louid}}
//  alert(goods_id);
$.get('/feng/addCart',{louid:louid},function(res){
    if(res.code =='00001'){
        alert(res.msg);
        location.href='/feng/login';
    }
    if(res.code =='00000'){
        alert(res.msg);
        location.href='/feng/index';
    }
    if(res.code =='00002'){
        alert(res.msg);
        location.href='/feng/index';
    }
},'json');
});
</script>
</html>