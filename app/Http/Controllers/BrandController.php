<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\StoreBrandPost;
use Validator;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $word=request()->word ?? '';
        $where=[];
        if($word){
            $where[]=['brand_name','like',"%$word%"];
        }
        $query=request()->all();
       
        $data=DB::table('brand')->where($where)->orderBy('brand_id','desc')->paginate(2);
            if(request()->ajax()){
             return view('admin.brand.ajaxindex',['data'=>$data,'query'=>$query]);
        }
        return view('admin.brand.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //public function store(StoreBrandPost $request)
    {
        // $validatedData = $request->validate([
        //     'brand_name' => 'required|unique:brand|max:255',
        //     //'body' => 'required',
        // ],[
        //         'brand_name.required'=>'品牌不能为空',
        //     ]);
           
        $post=$request->except('_token');
        $validator = Validator::make($post, [
            'brand_name' => 'required|unique:brand|max:255',
            //'body' => 'required',
        ],[
                    'brand_name.required'=>'品牌不能为空',
               ]);
            if ($validator->fails()) {
                return redirect('/create')
                ->withErrors($validator)
               ->withInput();
                }
        if($request->hasFile('brand_logo')){
            $post['brand_logo']=$this->upload('brand_logo');
        }
        $res=DB::table('brand')->insert($post);
        if($res){
            return  redirect('/brand/index');
        }else{
            return redirect('/brand/create');
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
     *详情页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $data=DB::table('brand')->where('brand_id','=',$id)->first();
    //dd($data);
    return view('admin.brand.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑页面
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=$request->except('_token');
       // dd($post);
        $data=DB::table('brand')->where('brand_id','=',$id)->update($post);
        if($data !==false){
            return redirect('/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=DB::table('brand')->where('brand_id','=',$id)->delete();
        if($data){
            return redirect('/index');
        }
    }
    public function checkOnly(){
        $brand_name=request()->brand_name;
        $where=[];
        if($brand_name){
            $where[]=['brand_name','=',$brand_name];
        }
        $data=DB::table('brand')->where($where)->count();
        echo intval($data);
    }
}
