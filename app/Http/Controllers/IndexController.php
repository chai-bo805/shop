<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendemail;
use Illuminate\Support\Facades\Mail;
class IndexController extends Controller
{
    //
    function test(){
        echo '好好学习天天向上';
    }
    public function dologin(){
        $post=request()->all();
        dd($post);
        //return view('dologin');
    }
    public function goods($name='苹果',$id){
        echo '商品id是:'.$id;
        echo '商品名称:'.$name;


    }
    public function edit(){
        showMsg(1,'Hello World!');
    }
    public function send_email()
    {
        Mail::to('2028488746@qq.com')->send(new sendemail());
    }
}
