<?php

namespace App\Http\Controllers;
use \App\Post;

class PostController extends Controller
{
    //列表
    public function index(){
        //无分页查询$posts = Post::orderBy('created_at','desc')->get();
        $posts = Post::orderBy('created_at','desc')->paginate(2);
        //输出查询语句
        //$posts = Post::orderBy('created_at','desc')->toSql();
        //dd($posts['0']->content);
        return view('post/index',compact('posts'));
    }

    //详情页面
    public function show(Post $post){
        //dd($post);
        //return view('post/show');
        return view('post/show',compact('post'));
    }

    //创建页面
    public function create()
    {
        return view('post/create');
    }

    /*创建逻辑--post提交 laravel会进行csrf token验证
    关闭验证需要在中间件目录中的VerifyCsrfToken中处理，否则在前端页面生成csrf_token
    */
    public function store(){
        /*1、接收所有request数据
         * dd(request()->all())；all()生成的是数组
        */
        //2、接收部分数据
        //$params = ['title'=>request('title'),'content'=>request('content')];
        //等同于上面的
        $params = request(['title','content']);
        //1、使用Orm的save保存数据--等同于tinker中的操作
       /* $post = new Post();
        $post->title = request('title');
        $post->title = request('content');
        $post->save();*/
        //2、使用Orm中的create批量赋值--对model中会做$fillable 和 $guarded 验证
        $result = Post::create($params);
        return ;
    }

    //编辑页面
    public function edit(){
        return view('post/edit');
    }

    //编辑逻辑
    public function update(){

    }

    //删除逻辑
    public function delete(){

    }
}

