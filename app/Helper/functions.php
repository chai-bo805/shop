<?php

// /**
//  * 公用的方法  返回json数据，进行信息的提示
//  * @param $status 状态
//  * @param string $message 提示信息
//  * @param array $data 返回数据
//  */
// function showMsg($status,$message = '',$data = array()){
//     $result = array(
//         'status' => $status,
//         'message' =>$message,
//         'data' =>$data
//     );
//     exit(json_encode($result));
// }
 function createTree($data,$parent_id=0,$level=1){
    static $new_array=[];
    if(!$data){
        return;
    }
    foreach($data as $k=>$v){
        if($v->parent_id == $parent_id){
            $v->level=$level;
            $new_array[]=$v;
            createTree($data,$v->cate_id,$level+1);
        }
    }
    return $new_array;
};

function upload($filename){
    if(request()->file($filename)->isValid()){
        $photo=request()->file($filename);
        $store_result=$photo->store('uploads');
        return $store_result;
    }
    exit('没有文件被上传');
}


function moreuploads($filename){
    if(!($filename)){
        return;
    }
    $imgs=request()->file($filename);
    $result=[];
    foreach($imgs as $v){
        //上传文件
        $result[]=$v->store('uploads');
    }
     return $result;
}
