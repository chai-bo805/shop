@foreach ($data as $v)
    <tr>
      <td>{{$v->book_id}}</td>
      <td>{{$v->book_name}}</td>
      <td>{{$v->book_author}}</td>
      <td>{{$v->book_price}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->book_cover}}" width="50px"></td>
      <td><a href="{{url('/book/destroy/'.$v->book_id)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/book/edit/'.$v->book_id)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="6">{{$data->appends($query)->links()}}</td>
    </tr>