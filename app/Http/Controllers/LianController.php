<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LianModel;
use DB;
class LianController extends Controller
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
            $where[]=['yuanname','like',"%$word%"];
        }
        $data=LianModel::where($where)->orderBy('yuanid','desc')->paginate(2);
        $query=request()->all();
        //dd($query);
        return view('lian.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lian.create');
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
        if($request->hasFile('yuantou')){
            $post['yuantou']=$this->upload('yuantou');
        }
        $data=LianModel::insert($post);
        //dd($data);
        if($data){
            return redirect('/lian/index');
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
        $data=LianModel::where('yuanid','=',$id)->first();
        return view('lian.edit',['data'=>$data]);
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
        if($request->hasFile('yuantou')){
            $post['yuantou']=$this->upload('yuantou');
        }
        $data=DB::table('yuan')->where('yuanid','=',$id)->update($post);
        if($data !==false){
            return redirect('/lian/index');
        }
        //dd($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=LianModel::destroy($id);
        if($data){
            return redirect('/lian/index');
        }
    }
}
