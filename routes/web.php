<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/hello', function () {
//     return 'hello';
// });
// Route::get('/aa','IndexController@test');
// Route::get('/bb',function(){
//     $name='小小甜';
//     return view('bb',['name'=>$name]);
// });
// Route::post('/dologin','IndexController@dologin');
// // Route::view('/bb','hello',['name'=>'洛阳白牡丹']);
// Route::view('/login','dologin');
// Route::get('user/{id}', function($id){
//     return '商品id是:'.$id;
// });
//Route::get('/goods/{id}/{name?}','IndexController@goods');
Route::prefix('brand')->middleware('checklogin')->group(function(){
    Route::get('/create','BrandController@create');
    Route::post('/store','BrandController@store');
    Route::get('/index','BrandController@index');
    Route::get('/destroy/{id}','BrandController@destroy');
    Route::get('/edit/{id}','BrandController@edit');
    Route::post('/update/{id}','BrandController@update');
    Route::get('/checkOnly','BrandController@checkOnly');
});


// Route::get('/create','AbController@create');
// Route::post('/store','AbController@store');
// Route::get('/index','AbController@index');
// Route::get('/destroy/{id}','AbController@destroy');
// Route::get('/edit/{id}','AbController@edit');
// Route::post('/update/{id}','AbController@update');

Route::get('/lian/create','LianController@create');
Route::post('/lian/store','LianController@store');
Route::get('/lian/index','LianController@index');
Route::get('/lian/destroy/{id}','LianController@destroy');
Route::get('/lian/edit/{id}','LianController@edit');
Route::post('/lian/update/{id}','LianController@update');

Route::get('/book/create','bookController@create');
Route::post('/book/store','bookController@store');
Route::get('/book/index','bookController@index')->middleware('checklogin');
Route::get('/book/destroy/{id}','bookController@destroy');
Route::get('/book/edit/{id}','bookController@edit');
Route::post('/book/update/{id}','bookController@update');

Route::get('/index/edit','IndexController@edit');

Route::prefix('cate')->group(function(){
    Route::get('/create','Catecontroller@create');
    Route::post('/store','Catecontroller@store');
    Route::get('/index','Catecontroller@index');
    Route::get('/destroy/{id}','Catecontroller@destroy');
    Route::get('/edit/{id}','Catecontroller@edit');
    Route::post('/update/{id}','Catecontroller@update');
});
Route::prefix('shop')->group(function(){
    Route::get('/create','ShopController@create');
    Route::post('/store','ShopController@store');
    Route::get('/index','ShopController@index');
    Route::get('/destroy/{id}','ShopController@destroy');
    Route::get('/edit/{id}','ShopController@edit');
    Route::post('/update/{id}','ShopController@update');
});
Route::prefix('new')->group(function(){
    Route::get('/create','NewController@create');
    Route::post('/store','NewController@store');
    Route::get('/index','NewController@index');
    Route::get('/destroy/{id}','NewController@destroy');
    Route::get('/edit/{id}','NewController@edit');
    Route::post('/update/{id}','NewController@update');
});

Route::prefix('login')->group(function(){
    Route::get('/login','LoginController@login');
    Route::post('/store','LoginController@store');
    Route::get('/logout','LoginController@logout');
    // Route::get('/destroy/{id}','NewController@destroy');
    // Route::get('/edit/{id}','NewController@edit');
    // Route::post('/update/{id}','NewController@update');
});
Route::prefix('article')->group(function(){
    Route::get('/create','ArticleController@create');
    Route::post('/store','ArticleController@store');
    Route::get('/index','ArticleController@index')->middleware('checklogin');
    Route::get('/destroy/{id}','ArticleController@destroy');
   // Route::post('/destroy/{id}','ArticleController@destroy');
    Route::get('/edit/{id}','ArticleController@edit');
    Route::post('/update/{id}','ArticleController@update');
    Route::get('/login','ArticleController@login');
    Route::post('/deng','ArticleController@deng');
    Route::get('/lu','ArticleController@lu');
});
Route::prefix('goods')->group(function(){
    Route::get('/create','GoodsController@create');
    Route::get('/add','GoodsController@add');
    Route::post('/store','GoodsController@store');
    Route::get('/index','GoodsController@index');
    Route::get('/destroy/{id}','GoodsController@destroy');
    Route::get('/edit/{id}','GoodsController@edit');
    Route::post('/update/{id}','GoodsController@update');
});
Route::prefix('feng')->group(function(){
    Route::get('/create','FengController@create');
    Route::post('/store','FengController@store');
    Route::get('/index','FengController@index');
    Route::get('/destroy/{id}','FengController@destroy');
    Route::get('/edit/{id}','FengController@edit');
    Route::post('/update/{id}','FengController@update');
    Route::get('/info/{id}','FengController@info');
    Route::get('/login','FengController@login');
    Route::post('/checklogin','FengController@checklogin');
    Route::get('/addCart','FengController@addCart');
});

Route::get('/send_email','IndexController@send_email');

Route::prefix('user')->middleware('checklogin')->group(function(){
    Route::get('/login','UserController@login');
    Route::post('/checklogin','UserController@checklogin');
    Route::get('/index','UserController@index');
    Route::get('/show','UserController@show');
});

Route::prefix('message')->middleware('checklogin')->group(function(){
    Route::get('/create','MessageController@create');
    Route::post('/store','MessageController@store');
    Route::get('/index','MessageController@index');
    Route::get('/destroy/{id}','MessageController@destroy');
    Route::get('/edit/{id}','MessageController@edit');
    Route::post('/update/{id}','MessageController@update');
    Route::get('/info/{id}','MessageController@info');
});