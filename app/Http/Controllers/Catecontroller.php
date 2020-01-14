<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CateModel;
class Catecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=CateModel::get();
        return view('admin.cate.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=CateModel::get();
       // dd($data);
        $data=createTree($data);
        //dd($data);
        return view('admin.cate.create',['data'=>$data]);
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
        $data=CateModel::insert($post);
        if($data){
            return redirect('/cate/index');
        }
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
        $data=CateModel::get();
        // dd($data);
         $data=createTree($data);
        $result=CateModel::where('cate_id','=',$id)->first();
        dump($result);
        return view('admin.cate.edit',['result'=>$result,'data'=>$data]);
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
        $data=CateModel::where('cate_id','=',$id)->update($post);
        if($data !==false){
            return redirect('/cate/index');
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
        $data=CateModel::where('cate_id','=',$id)->delete();
        if($data){
            return redirect('/cate/index');
        }
    }
}
