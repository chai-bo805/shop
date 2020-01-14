<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Cache;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $page=request()->page?:1;
        $data=Cache('data_'.$page);
        //echo $page;
        // $data=Cache();
        if(!$data){
            echo '走db';
        $data=DB::table('goods')
                ->select('goods.*','brand.brand_name','cate.cate_name')
                ->leftjoin('brand','goods.brand_id','=','brand.brand_id')
                ->leftjoin('cate','goods.cate_id','=','cate.cate_id')
                ->paginate(2);
        //dd($data);
        cache(['data_'.$page=>$data],40);
        }
         if($data){
            foreach($data as $v){
                $v->goods_imgs=explode('|',$v->goods_imgs);
            }
       }
        if(request()->ajax()){
            return view('goods.ajaxindex',['data'=>$data]);
        }
        if($data){
            return view('goods.index',['data'=>$data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post=$request->except('_token');
       dd($post);
       //多文件上传
       if(isset($post['goods_imgs'])){
        $post['goods_imgs']=moreuploads('goods_imgs');
        $post['goods_imgs']=implode('|',$post['goods_imgs']);
    }
    //单文件上传
       if($request->hasFile('goods_picture')){
           $post['goods_picture']=$this->upload('goods_picture');
       }

       $data=DB::table('goods')->insert($post);
      
           return redirect('/goods/index');
       
    }
    public function upload($filename){
        if(request()->file($filename)->isValid()){
            $photo=request()->file($filename);
            $store_result=$photo->store('uploads');
            return $store_result;
        }
        exit('没有文件被上传');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data=DB::table('goods')->where('goods_id','=',$id)->delete();
      if($data){
          if(request()->ajax()){
              echo json_encode(['code'=>'00000','msg'=>'删除成功']);
          };
      }
    }
    public function add(){
        $data=DB::table('brand')->get();
        $result=DB::table('cate')->get();
        $result=createTree($result);
        return view('goods.add',['data'=>$data,'result'=>$result]);
    }
}
