@foreach ($data as $v)
    <tr>
      <td>{{$v->brand_id}}</td>
      <td>{{$v->brand_name}}</td>
      <td>{{$v->brand_url}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_logo}}"width="50px"></td>
      <td>{{$v->brand_desc}}</td>
      <td><a href="{{url('/destroy/'.$v->brand_id)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/edit/'.$v->brand_id)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="6">{{$data->links()}}</td>
    </tr>