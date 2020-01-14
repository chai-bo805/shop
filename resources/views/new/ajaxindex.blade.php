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
    <td colspan="6">{{$data->links()}}</td>
    </tr>
    