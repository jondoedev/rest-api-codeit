<?php

use App\App;
use App\Models\Post;
use Rakit\Validation\Validator as Validator;

return [

    [
        'method' => 'GET',
        'pattern' => '/',
        'handler' => function($request){
            return App::render('main');
        }
    ],
    /**
     * domain/posts/
     * This route allows us to get all existing posts
     */
    [
        'method' => 'GET',
        'pattern' => '/posts',
        'handler' => function ($request) {
            return App::json(Post::all());
        }
    ],
    /**
     * domain/posts/ID - where ID = Post ID that you want to get
     */
    [
        'method' => 'GET',
        'pattern' => '/posts/(\d+)',
        'handler' => function($request, $id){
            return App::json(Post::findOrFail($id));
        }
    ],

    /**
     * domain/posts/create
     * on this route you cann create new post
     * --Post data sending in a request body
     */
    [
        'method' => 'POST',
        'pattern' => '/posts/create',
        'handler' => function($request){
            $rules = [
                'id' => 'numeric',
                'title' => 'required|',
                'content' => 'required|min:2|',
                'author' => 'required'];
            App::Validator($request, $rules);
            $post = Post::create($request['json']);
            return App::json($post);
        }
    ],

    /**
     * domain/posts/delete/ID - where ID = Post ID you want to delete
     *
     */
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
    /**
     * domain/posts/edit/ID - where ID = Post Id you want to edit
     * Post data sending in a request body as:
     * {
     *  "key":"value",
     *  "key":"value"
     * }
     *
     */
    [
        'method' => 'PUT',
        'pattern' => '/posts/edit/(\d+)',
        'handler' => function ($request, $id){

            $rules = [
                //validation rules
                'title' => 'min:2',
                'content' => 'min:10',
                'author' => 'min:2'
            ];
            App::Validator($request,$rules);

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