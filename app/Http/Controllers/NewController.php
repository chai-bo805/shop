<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewModel;
use App\NewcateModel;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $new_author=request()->new_author??'';
      $page=request()->page?:1;
      $data=cache('data_'.$new_author.'_'.$page);
      if(!$data){
          echo '走数据库';
      $where=[];
      if($new_author){
       $where[]=['new_author','like',"%$new_author%"];   
      }
        $data=NewModel::where($where)->orderBy('new_id','desc')->paginate(2);
       // dd($data);
       cache(['data_'.$new_author.'_'.$page=>$data],300);
    }
      $query=request()->all();
       if(request()->ajax()){
        return view('new.ajaxindex',['data'=>$data,'query'=>$query]);
   }
        return view('new.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post=NewcateModel::get();
        $data=createTree($post);
        //dd($data);
        return view('new.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $post=request()->except('_token');
        $post['add_time']=time();
        $data=NewModel::insert($post);
        //dd($data);
        return redirect('/new/index');
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
        //
    }
}
