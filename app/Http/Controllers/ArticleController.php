<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArticleModel;
use DB;
use Validator;
use Illuminate\Support\Facades\Redis;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acate=request()->acate??'';
        $word=request()->word??'';
        $page=request()->page?:1;
        $data=Redis::get('data_'.$page.'_'.$acate);
        if(!$data){
            echo '走数据库';
        $where=[];
        if($acate){
            $where[]=['acate','=',$acate];
        }
        if($word){
            $where[]=['atitle','like',"%$word%"];
        }
        $data=ArticleModel::where($where)->orderBy('aid','desc')->paginate(2);
        $data=serialize($data);
        Redis::setex('data_'.$page.'_'.$acate,20,$data);
    }
        $data=unserialize($data);
        $query=request()->all();
        if($data){
            return view('article.index',['data'=>$data,'query'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //         'atitle' => 'required|unique:brand|max:255',
        //         'atitle' => 'regix:/^\w+s/',
        //     ],[
        //             'atitle.regix'=>'文章标题要有中文，数字，字母，下划线组成',
        //         ]);
        $post=request()->except('_token');
        $validator=Validator::make($post,[
            'atitle'=>[
                'required',
                'unique:article',
                'max:255',
                'regex:/^[\x{4e00}-x{9fa5}A-Za-z0-9_]+$/u',
            ],
            'atitle'=>'required',
        ],[
                'atitle.required'=>'文章标题必填',
                'atitle.regex'=>'文章标题必须由中文，数字，字母，下划线组成',
                'atitle.unique'=>'文章标题唯一',
            ]);
        $post['add_time']=time();
        if(request()->hasFile('picture')){
            $post['picture']=$this->upload('picture');
        }
        $data=ArticleModel::insert($post);
       
        if($data){
            return redirect('/article/index');
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
        $data=ArticleModel::where('aid','=',$id)->first();
        return view('article.edit',['data'=>$data]);
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
        if($request->hasFile('picture')){
            $post['picture']=$this->upload('picture');
        }
        $data=ArticleModel::where('aid','=',$id)->update($post);
        if($data){
            return redirect('/article/index');
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
        $data=ArticleModel::where('aid','=',$id)->delete();
        if($data){
            if(request()->ajax()){
                echo json_encode(['code'=>'00000','msg'=>'删除成功']);
            };
        }
    }
    public function login(){
        return view('/article/login');
    }
    public function deng(){
        $post=request()->except('_token');
        $data=DB::table('admin')->where($post)->first();
        if($data){
            session(['admin'=>$data]);
            request()->session()->save();
            return redirect('/article/index');
        }
        return redirect('/article/login')->with('msg','没有此用户，请重新输入');
    }
    public function lu(){
        session(['admin'=>null]);
        request()->session()->save();
        return redirect('/article/login');
    }
}
