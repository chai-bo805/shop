<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    public function login(){
        return view('admin.login.create');
    }
    public function store(){
       $post=request()->except('_token');
       $data=DB::table('admin')->where($post)->first();
       //dd($data);
    if($data){
        session(['admin'=>$data]);
        request()->session()->save();
        // $all=request()->session('admin');
        //  dd($all);
       return redirect('/message/index');
    }
    return redirect('/login/login')->with('msg','没有此用户，请重新输入');
    }
    public function logout(){
        session(['admin'=>null]);
        request()->session()->save();
        return redirect('/login/login');
    }
}
