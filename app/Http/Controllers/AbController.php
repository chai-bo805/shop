<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ AbModel;
class AbController extends Controller
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
            $where[]=['studentname','like',"%$word%"];
        }
        $query=request()->all();

        $data=AbModel::orderBy('studentid','desc')->where($where)->paginate(2);
        
        return view('Ab.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ab.create');
    }
    public function upload($filename){
        if($request->file($filename)->isValid()){
            $photo = $request->file($filename);
            $store_result=$photo->store('photo');
            return $store_result;
        }
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
        // $data=AbModel::insert($post);
        $data=new AbModel;
        $data->studentname=$post['studentname'];
        $data->studentsex=$post['studentsex'];
        $data->studentban=$post['studentban'];
        $data->save();
        if($data){
            return redirect('/index');
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
        $data=DB::table('student')->where('studentid','=',$id)->first();
        return view('Ab.edit',['data'=>$data]);
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
        //$data=AbModel::table('')
        $data=DB::table('student')->where('studentid','=',$id)->update($post);
        if($data !==false){
            return redirect('/index');
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
        $data=DB::table('student')->where('studentid','=',$id)->delete();
        if($data){
            return redirect('/index');
        }
    }
}
