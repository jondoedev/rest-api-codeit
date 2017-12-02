<?php

use App\App;
use App\Models\Post;

return [
    '/posts' => function (/*$reques}t*/) {
        return App::json(Post::all());
    },

    '/posts/(\d+)' => function($id){
        return App::json(Post::find($id));
    }
];