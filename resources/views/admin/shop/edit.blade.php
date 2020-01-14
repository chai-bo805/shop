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
<!-- @if ($errors->any())
 <div class="alert alert-danger">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif -->
<form class="form-horizontal" role="form" action="{{url('/shop/update/'.$result->goods_id)}}" method="post" enctype="multipart/form-data">
 @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$result->goods_name}}" name="goods_name" id="firstname" placeholder="请输入商品名称">
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-10">
      <select name="cate_id" id="" disabled>
      <option value="">---请选择---</option>
      @foreach ($data as $v)
      <option value="{{$v->cate_id}}"{{$result->cate_id==$v->cate_id?'selected':''}}>@php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v->level);@endphp {{$v->cate_name}}</option>
      @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$result->goods_price}}" name="goods_price" id="firstname" placeholder="请输入商品价格">
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品简介</label>
    <div class="col-sm-10">
     <textarea name="goods_desc" id="firstname" placeholder="请输入商品名称">{{$result->goods_desc}}"</textarea>
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品图片</label>
    <div class="col-sm-10">
    <img src="{{env('UPLOAD_URL')}}{{$result->goods_picture}}" width="50px"><input type="file" class="form-control" value="{{$result->goods_picture}}" name="goods_picture" id="firstname">
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品状态</label>
    <div class="col-sm-10">
    @if($result->goods_status ==1)
      <input type="radio"  name="goods_status" id="firstname" value="1" checked>上架
      <input type="radio"  name="goods_status" id="firstname" value="2">下架
    @else
    <input type="radio"  name="goods_status" id="firstname" value="1">上架
    <input type="radio"  name="goods_status" id="firstname" value="2" checked>下架
    @endif
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">编辑</button>
    </div>
  </div>
</form>

</body>
</html>