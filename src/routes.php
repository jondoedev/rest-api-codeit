<?php

use App\App;
use App\Models\Post;

return [

	'/' => function($request){
        return App::render('main');
	},

    '/posts' => function ($request) {
//        return App::json(Post::all());
        return App::render('main');
    },

    '/posts/(\d+)' => function($request, $id){
        return App::json(Post::find($id));
    },

    // TODO: URL it in rest way
    '/posts/create' => function($request){
        $post = Post::create($request['json']);
        return App::json($post);
    },
    //TODO: Create an a form to fill DB columns
    '/posts/new' => function(){

        $data = [
            "title"=>$_GET['title'],
            "content"=>$_GET['content'],
            "author"=>$_GET['author']
        ];
        $post = Post::create($data);
        return App::json($post);
    },

    "/posts/delete" => function($request){
        $id = $request['json'];
        Post::find($id);
        $result = Post::destroy($request['json']);
        $msg = 'PWas Deleted Successfully';
        return $result.$msg;
    }
];