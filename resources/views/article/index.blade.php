<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.min.js"></script> 
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>Document</title>
</head>
<body>
<h3>欢迎【{{session('admin')->name}}】登陆 <a href="/article/lu">退出</a></h3>
    <a href="{{url('/article/create')}}">文章添加</a>
    <form>
    <select name="acate" id="">
    <option value="">---请选择---</option>
     <option value="桃李">桃李</option>
     <option value="单数">单书</option>
     <option value="芳华">芳华</option>
    </select>
    <input type="text" name="word"value="{{$query['word']??''}}" placeholder="请输入文章标题">
    <button>搜索</button>
    </form>
<table class="table table-striped">
  <caption>文章列表</caption>
  <thead>
    <tr>
      <th>文章id</th>
      <th>文章标题</th>
      <th>文章分类</th>
      <th>重要程度</th>
      <th>是否显示</th>
      <th>文章作者</th>
      <th>作者email</th>
      <th>添加时间</th>
      <th>简介</th>
      <th>图片</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $v)
    <tr>
      <td>{{$v->aid}}</td>
      <td>{{$v->atitle}}</td>
      <td>{{$v->acate}}</td>
      <td>{{$v->azhong==1?'普通':'置顶'}}</td>
      <td>{{$v->axian==1?'√':'×'}}</td>
      <td>{{$v->author}}</td>
      <td>{{$v->aemail}}</td>
      <td>{{date("Y-m-d H:i:s",$v->add_time)}}</td>
      <td>{{$v->adesc}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->picture}}" width="50px"></td>
      <td><a href="javascipt:void(0)" onclick="ajaxdel({{$v->aid}})" class="btn btn-info">删除按钮</a>|<a href="{{url('/article/edit/'.$v->aid)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="11">{{$data->appends($query)->links()}}</td>
    </tr>
  </tbody>
</table>
<script>
;
  function ajaxdel(id){
     if(!id){
         alert('请选择您要删除的id');
         return;
     }
    //  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
    //  $.ajax({
    //      type:'POST',
    //      url:"/article/destroy/"+id,
    //      data:{id:id},
    //      dataType:'json',
    //      success:function(res){
    //         if(res.code=='00000'){
    //             alert(res.msg);
    //             location.reload();
    //         }


    //      }
    //  });  
    $.get('/article/destroy/'+id,function(res){
      if(res.code=='00000'){
        alert(res.msg);
        location.reload();
      }
    },'json');
  }
</script>
</body>
</html>