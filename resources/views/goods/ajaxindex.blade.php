@foreach ($data as $v)
    <tr>
      <td>{{$v->goods_id}}</td>
      <td>{{$v->goods_name}}</td>
      <td>{{$v->cate_name}}</td>
      <td>{{$v->brand_name}}</td>
      <td>{{$v->goods_price}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_picture}}" width="50px"></td>
      <td>
      @if($v->goods_imgs)
      @foreach ($v->goods_imgs as $vv)
      <img src="{{env('UPLOAD_URL')}}{{$vv}}" width="50px">
      @endforeach
      @endif
      </td>
      <td>{{$v->goods_desc}}</td>
      <td><a href="javascript:void(0)" onclick="ajaxdel({{$v->goods_id}})" class="btn btn-info">删除按钮</a>|<a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-success">编辑按钮</a></td>
    </tr>
 @endforeach
    <tr>
    <td colspan="9">{{$data->links()}}</td>
    </tr>