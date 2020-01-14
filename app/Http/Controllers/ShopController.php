<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShopModel;
use App\CateModel;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $word=request()->word??'';
        $where=[];
        if($word){
            $where[]=['goods_name','like',"%$word%"];
        }
        $query=request()->all();

        $data=ShopModel::where($where)->orderBy('goods_id','desc')->paginate(2);
        if(request()->ajax()){
            return view('admin.shop.ajaxindex',['data'=>$data,'query'=>$query]);
        }
        if($data){
            return view('admin.shop.index',['data'=>$data,'query'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post=CateModel::get();
        $data=createTree($post);
        //dd($data);
        return view('admin.shop.create',['data'=>$data]);
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
        if(request()->hasFile('goods_picture')){
            $post['goods_picture']=$this->upload('goods_picture');
        }
        $post['add_time']=time();
        $data=ShopModel::insert($post);
        if($data){
            return redirect('/shop/index');
        }
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
        $post=CateModel::get();
        $data=createTree($post);
        $result=ShopModel::where('goods_id','=',$id)->first();
        return view('admin.shop.edit',['result'=>$result,'data'=>$data]);
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
        $post=$request->except('_token');
        if($request->hasFile('goods_picture')){
            $post['goods_picture']=$this->upload('goods_picture');
        }
        $data=ShopModel::where('goods_id','=',$id)->update($post);
        if($data !=false){
            return redirect('/shop/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=ShopModel::where('goods_id','=',$id)->delete();
        if($data){
            return redirect('/shop/index');
        }
    }
}
