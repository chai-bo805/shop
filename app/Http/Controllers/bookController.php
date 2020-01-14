<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bookModel;
use Illuminate\Support\Facades\Cache;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $word=request()->word??'';
        $page=request()->page?:1;
        $data=cache('data_'.$word.'_'.$page);
        if(!$data){
            echo '走数据库';
        $where=[];
        if($word){
            $where[]=['book_name','like',"%$word%"];
        }
        
         $data=bookModel::where($where)->orderBy('book_id','desc')->paginate(2);
         cache(['data_'.$word.'_'.$page=>$data],30);
    }
        $query=request()->all();
        if(request()->ajax()){
            return view('book.ajaxindex',['data'=>$data,'query'=>$query]);
        }
        return view('book.index',['data'=>$data,'query'=>$query]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
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
        //dd($post);
        if($request->hasFile('book_cover')){
            $post['book_cover']=$this->upload('book_cover');
        }
        $data=bookModel::insert($post);
        if($data){
            return redirect('/book/index');
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
        $data=bookModel::where('book_id','=',$id)->first();
        //dd($data);
        if($data){
            return view('/book/edit',['data'=>$data]);
        }
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
        $data=bookModel::where('book_id','=',$id)->update($post);
        if($data){
            return redirect('/book/index');
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
        echo $id;
        $data=bookModel::where('book_id','=',$id)->delete();
        if($data){
            return redirect('/book/index');
        }
    }
}
