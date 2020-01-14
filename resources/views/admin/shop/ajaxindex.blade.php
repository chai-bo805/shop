@foreach ($data as $v)
    <tr>
      <td>{{$v->goods_id}}</td>
      <td>{{$v->goods_name}}</td>
      <td>{{$v->cate_id}}</td>
      <td>{{$v->goods_price}}</td>
      <td>{{$v->goods_desc}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_picture}}" width="50px"></td>
      <td>{{$v->goods_status==1?'上架':'下架'}}</td>
      <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
      <td><a href="{{url('/shop/destroy/'.$v->goods_id)}}" class="btn btn-info">删除按钮</a>|<a href="{{url('/shop/edit/'.$v->goods_id)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="9">{{$data->appends($query)->links()}}</td>
    </tr>