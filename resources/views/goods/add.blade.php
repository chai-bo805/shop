<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/static/admin/js/jquery.min.js"></script>
    <script src="/static/admin/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
    <script type="text/javascript" charset="utf-8" src="/static/utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/utf8-php/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/static/utf8-php/lang/zh-cn/zh-cn.js"></script>
    <title>Document</title>
</head>
<body>
<h3>商品添加</h3>
<ul id="myTab" class="nav nav-tabs">
	<li class="active">
		<a href="#home" data-toggle="tab">
			 基础信息
		</a>
	</li>
	<li><a href="#ios" data-toggle="tab">商品相册</a></li>
    <li><a href="#desc" data-toggle="tab">商品详情</a></li>
	
</ul>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade in active" id="home">
		<p>
        <form class="form-horizontal" role="form" action="{{url('/goods/store')}}" method="post"enctype="multipart/form-data">
 @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_name" id="firstname" placeholder="请输入名称">
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-10">
    <select name="cate_id" id="">
    <option value="">---请选择---</option>
    @foreach ($result as $v)
    <option value="{{$v->cate_id}}">@php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$v->level);@endphp {{$v->cate_name}}</option>
    @endforeach
    </select>
      
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品品牌</label>
    <div class="col-sm-10">
    <select name="brand_id" id="">
    <option value="">---请选择---</option>
    @foreach ($data as $v)
    <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
    @endforeach
    </select>
      <!-- <b style="color:red">{{$errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="goods_price" id="firstname" placeholder="请输入价格">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品图片</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="goods_picture" id="firstname" placeholder="请输入图片">
    </div>
  </div>
        </p>
	</div>

	<div class="tab-pane fade" id="ios">
		<p>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品图册</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" multiple="multiple" name="goods_imgs[]" id="firstname" placeholder="请输入图片">
    </div>
  </div>
        
        </p>
	</div>

	<div class="tab-pane fade" id="desc">
		<p>
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品简介</label>
    <div class="col-sm-10">
    <script id="editor" name="goods_desc" type="text/plain" style="width:120%;height:400px;"></script>  
    </div>
  </div>
        </p>
	</div>

	<!-- <div class="tab-pane fade" id="ejb">
		<p>Enterprise Java Beans（EJB）是一个创建高度可扩展性和强大企业级应用程序的开发架构，部署在兼容应用程序服务器（比如 JBOSS、Web Logic 等）的 J2EE 上。
		</p>
	</div> -->
</div>

 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">商品添加</button>
    </div>
</div>
</form>

</body>
<script type="text/javascript">
$(function(){
    var ue = UE.getEditor("editor");
});
</script>

</html>