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
    //return "Hello World";
});
//get提交路由
Route::get('get',function (){
    return "Text1";
});
Route::post("post",function (){
    return "这是post提交路由";
});
Route::match(['get','post'],'mat',function (){
    return "这是get和post都可以访问的路由";
});
Route::any("any",function (){
    return "任何形式都可以访问";
});
//带参数的路由
Route::get('par/{id}',function ($id){
    return "它的ID是：$id";
});
Route::get('param/{id}/{name}',function ($id,$name){
    return "{$name}的 ID为：{$id}";
});
//可选参数（参数后带?，必须设定默认参数值）
Route::get("parament/{id?}",function ($id='359'){
    return "所取ID为：{$id}";
});
//给参数设定正则限制
Route::get('par1/{id}',function ($id){
    return "它的ID是：$id";
})->where("id",'[0-9]+');
Route::get('param1/{id}/{name}',function ($id,$name){
    return "{$name}的 ID为：{$id}";
})->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);

//为控制器方法指定路由名称：
//Route::get('test/test', 'TestController@test');
Route::get('lisence', 'TestController@lisence')->name('lisence');
Route::get("url",function (){
    // 生成 URL...
    $url = route('lisence');
    return $url;
    /*// 生成重定向...
    return redirect()->route('lisence')*/;
});

Route::get('user/{id}/profile', function ($id) {
    $url = route('profile', ['id' => 1]);
    return $url;
})->name('profile');

//中间件
Route::get("test/test",'TestController@test')->middleware('age');






