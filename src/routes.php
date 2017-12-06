<?php

use App\App;
use App\Models\Post;

return [
    [
        'method' => 'GET',
        'pattern' => '/',
        'handler' => function($request){
            return App::render('main');
        }
    ],
    
    [
        'method' => 'GET',
        'pattern' => '/posts',
        'handler' => function ($request) {
            return App::json(Post::all());
        }
    ],
    
    [
        'method' => 'GET',
        'pattern' => '/posts/(\d+)',
        'handler' => function($request, $id){
            return App::json(Post::findOrFail($id));
        }
    ],
    
    [
        'method' => 'POST',
        'pattern' => '/posts/create',
        'handler' => function($request){
            $post = Post::create($request['json']);
            return App::json($post);
        }
    ],

    [
        'method' => 'DELETE',
        'pattern' => "/posts/delete/(\d+)",
        'handler' => function($request, $id){
            $post = Post::findOrFail($id);
            $post->delete();
            return "Item #{$id} Was Deleted Successfully";
        }
    ],
        //TODO: Try to make this code more flexible and convenient for reuse
    [
        'method' => 'PUT',
        'pattern' => '/posts/edit/(\d+)',
        'handler' => function ($request, $id){
            $request_data = $request['json'];
            $post = Post::find($id);
            if(isset($request_data['title'])){
                $post->title = $request_data['title'];
            }
            if (isset($request_data['content'])){
                $post->content = $request_data['content'];
            }
            if(isset($request_data['author'])){
                $post->author = $request_data['author'];
            }
            if(isset($request_data['created_at'])){
                $post->created_at = $request_data['created_at'];
            }
            $post->save();
            return App::json($post);
        }
    ]
];