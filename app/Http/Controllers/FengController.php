<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FengModel;
use App\AddCart;
use DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;
class FengController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=FengModel::paginate(2);
        foreach($data as $v){
              if($v->imgs){
                $v->imgs=explode('|',$v->imgs);
            }
        }
          //dd($data);
        if($data){
            return view('feng/index',['data'=>$data]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feng.create');
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
        $post['imgs']=moreuploads('imgs');
        $post['imgs']=implode('|',$post['imgs']);
        if($request->hasFile('picture')){
            $post['picture']=$this->upload('picture');
        }
        $data=FengModel::insert($post);
        // if($data){
        //     foreach($data as $v){
        //         $v->imgs=explode('|',$v->imgs);
        //     }
        // }
        // dd($data);
        if($data){
            return redirect('/feng/index');
        }
        
    }
    public function upload($filename){
        if(request()->file($filename)->isValid()){
            $photo=request()->file($filename);
            $store_result=$photo->store('uploads');
            return $store_result;
        }
        exit('文件没有被上传');
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
        $data=FengModel::where('louid','=',$id)->delete();
        if($data){
            if(request()->ajax()){
                echo json_encode(['code'=>'00000','msg'=>'删除成功']);
            }
        }
    }
    public function info($id){
       $number=Redis::setnx('info_'.$id,1);
       if(!$number){
          $number=Redis::incr('number'); 
       }
        $data=FengModel::where('louid','=',$id)->first();
        //dd($data);
                if($data->imgs){
                    $data->imgs=explode('|',$data->imgs);
                }

        
    return view('feng.info',['data'=>$data,'number'=>$number]);
    }
    public function login(){
        return view('feng.login');
    }
    public function checklogin(){
        $post=request()->except('_token');
        $data=DB::table('admin')->where($post)->first();
        //dd($data);
     if($data){
         session(['admin'=>$data]);
         request()->session()->save();
         // $all=request()->session('admin');
         //  dd($all);
         return redirect('/feng/index');
     }
     return redirect('/feng/login')->with('msg','没有此用户，请重新输入');
     }
    
    public function addCart(){
        $louid=request()->louid;
        $buy_number=1;

        if(!$this->islogin()){
           
            $data=Cookie::get('cart');
            $data=json_decode($data,true);
            $this->Cookiecart($louid,$buy_number);
        }else{
            $this->dbcart($louid,$buy_number);
        } 
        
    }

    public function Cookiecart($louid,$buy_number){
    $lou_data=FengModel::where('louid','=',$louid)->first();
    if($lou_data->cun<$buy_number){
        echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
    }
    $data=json_decode(Cookie::get('cart'),true);
    if(array_key_exists('cart_'.$louid,$data)){
        $data['cart_'.$louid]['buy_number']+=$buy_number;
        if($lou_data->cun<$data['cart_'.$louid]['buy_number']){
        echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;  
        }
        return response()->json(['code'=>'00000','msg'=>'购物车添加成功'])->cookie('cart',json_encode($data),30);
    } 
    //正常添加
    $data['cart_'.$louid]=[
        'user_id'=>$user_id,
        'louid'=>$louid,
        'buy_number'=>$buy_number,
        'goods_price'=>$lou_data['price'],
        'add_time'=>time(),
    ];
   return response()->json(['code'=>'00000','msg'=>'加入购物车成功'])->cookie('cart',json_encode($data),30);
    }

    public function dbcart($louid,$buy_number){
         $lou_data=FengModel::where('louid','=',$louid)->first();
         if($lou_data->cun<$buy_number){
             echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
         }
        $user_id=session('admin')->id;
        //判断用户之前是否购买过
         $result=AddCart::where(['user_id'=>$user_id,'louid'=>$louid])->first();
        if($result){
            if($result->buy_number+$buy_number){
                echo json_encode(['code'=>'00002','msg'=>'库存不足']);die;
            }
            $result=AddCart::where(['user_id'=>$user_id,'louid'=>$louid])->increment('buy_number');
            if($result){echo json_encode(['code'=>'00000','msg'=>'购物车添加成功']);die;};
        }
        $data=[
            'user_id'=>$user_id,
            'louid'=>$louid,
            'buy_number'=>$buy_number,
            'goods_price'=>$lou_data['price'],
            'add_time'=>time(),
        ];
        $data=AddCart::insert($data);
         if($data){
            echo json_encode(['code'=>'00000','msg'=>'购物车添加成功']);
        }

       
        
        //判断库存
        // if($lou_data['cun']<){}
       
        }
    public function isLogin(){
        $user=session('admin');
        if(!$user){
            return false;
        }
        return true;
    }
}

