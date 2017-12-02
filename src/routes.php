<?php

use App\App;
use App\Models\Post;

return [
    '/posts' => function ($request) {
        return App::json(Post::all());
    },

    '/posts/(\d+)' => function($request, $id){
        return App::json(Post::find($id));
    },

    // TODO: URL it in rest way
    '/posts/create' => function($request){
        $post = Post::create($request['json']);
        return App::json($post);
    }
];