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
    
<form class="form-horizontal" role="form" action="{{url('/article/store')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章标题</label>
    <div class="col-sm-10">
      <input type="text" name="atitle" class="form-control" id="title" placeholder="请输入文章标题">
      <b style="color:red">{{$errors->first('atitle')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章分类</label>
    <div class="col-sm-10">
     <select name="acate" id="cate">
     <option value="">---请选择---</option>
     <option value="桃李">桃李</option>
     <option value="单数">单书</option>
     <option value="芳华">芳华</option>
     </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">重要程度</label>
    <div class="col-sm-10">
      <input type="radio" name="azhong"  id="azhong" value="1" checked>普通
      <input type="radio" name="azhong"  id="azhong" value="2" >置顶
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
    <input type="radio" name="axian" id="axian" value="1" checked>显示
    <input type="radio" name="axian" id="axian" value="2">不显示
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章作者</label>
    <div class="col-sm-10">
      <input type="text"name="author" class="form-control" id="firstname" placeholder="请输入作者姓名">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">作者email</label>
    <div class="col-sm-10">
      <input type="text"name="aemail" class="form-control" id="firstname" placeholder="请输入email">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">关键字</label>
    <div class="col-sm-10">
      <input type="text"name="guan" class="form-control" id="firstname" placeholder="请输入关键字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">描述</label>
    <div class="col-sm-10">
      <textarea name="adesc" id="" cols="30" rows="10"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">图片</label>
    <div class="col-sm-10">
      <input type="file"name="picture" class="form-control" id="lastname">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">文章添加</button>
    </div>
  </div>
</form>
<script>
$('#title').blur(function(){
    var title=$('[name=atitle]').val();
    if(title == ''){
        alert('文章标题不能为空');
    }
});
$('#cate').blur(function(){
    var cate=$(':selected').val();
   // alert(cate);
    if(cate == ""){
        alert('文章分类不能为空');
    }
});
$('#azhong').blur(function(){
    var zhong=$(':checked').val();
   // alert(cate);
    if(zhong == ""){
        alert('文章重要性不能为空');
    }
});
$('#axian').blur(function(){
    var xian=$(':checked').val();
   // alert(cate);
    if(xian == ""){
        alert('文章显示不能为空');
    }
});
</script>
</body>
</html>