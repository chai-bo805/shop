<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }
    public function checklogin(){
        $post=request()->except('_token');
        $data=DB::table('admin')->where($post)->first();
        if($data){
            session(['admin'=>$data]);
            request()->session()->save();
            $data=session('admin');
            //dd($data);
            if($data->status==1){
                return redirect('/user/index');
            }else{
                return redirect('/user/show');
            }
        }
        return redirect('/user/login')->with('msg','没有此用户，请重新输入');
    }
    public function index(){
        return view('user.index');
    }
    public function show(){
        $data=DB::table('admin')->get();
        //dd($data);
        return view('user.show',['data'=>$data]);
    }
}
