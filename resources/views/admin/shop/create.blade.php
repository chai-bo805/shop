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
     
 <form class="form-horizontal" role="form" action="{{url('/shop/store')}}" method="post" enctype="multipart/form-data">
 @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" name="goods_name" class="form-control" id="firstname" placeholder="请输入商品名称">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-10">
     <select name="cate_id">
     <option value="">---请选择---</option>
     @foreach ($data as $v)
     <option value="{{$v->cate_id}}">@php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v->level);@endphp {{$v->cate_name}}</option>
     @endforeach
     </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" name="goods_price" class="form-control" id="firstname" placeholder="请输入价格">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品简介</label>
    <div class="col-sm-10">
      <textarea  type="text" name="goods_desc" class="form-control" id="firstname" placeholder="请输入简介"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品图片</label>
    <div class="col-sm-10">
      <input type="file" name="goods_picture" class="form-control" id="firstname" >
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品状态</label>
    <div class="col-sm-10">
      <input type="radio"  id="lastname" name="goods_status" value="1">上架
      <input type="radio"  id="lastname" name="goods_status" value="2">下架
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">商品添加</button>
    </div>
  </div>
</form>

 </body>
 </html>   