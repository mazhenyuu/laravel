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


/*
 1Http多种请求的配置
 /代表页面路径
 Route::get('/','[控制器@行为]');
*/

//post,任意,匹配post或get多种请求
/*Route::post('/posts','\APP\Http\Controllers\PostController@index');
Route::any('/posts','\APP\Http\Controllers\PostController@index');
Rount::match(['get','post'],'/posts','\APP\Http\Controllers\PostController@index');*/

/*
2路由参数
可后加正则过滤
*/
//Route::get('/post/{$id}','\APP\Http\Controllers\PostController@index');

/*
3路由分组之路由前缀--整合多个路由,指定前缀后,里面的前缀可以省略。
路由分组之命名空间--可指定命名空间
*/
/*Route::group(['preifx'=>'posts'],function(){
    Route::put('/','\APP\Http\Controllers\PostController@index');
    Route::any('/{$id}','\APP\Http\Controllers\PostController@index');
    Rount::match(['/create','/posts','\APP\Http\Controllers\PostController@index');
});*/

/*
4模型绑定--不太理解
*/

/*Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});*/

//文章列表页
Route::get('/posts', '\App\Http\Controllers\PostController@index');

//创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
Route::post('/posts','\App\Http\Controllers\PostController@store');

//文章详情页--调整了顺序放在创建文章的下面了，否则会报错
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');

//编辑文章
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}','\App\Http\Controllers\PostController@update');

//删除文章
Route::get('/posts/delete','\App\Http\Controllers\PostController@delete');
