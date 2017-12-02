<?php

namespace App;

use App\Models\Post;
use App\Models\User;
use ArrayAccess;
use Illuminate\Database\Capsule\Manager as Capsule;
use Rakit\Validation\Validator;

class App
{
    public static $config;

    public static function init()
    {
        session_start();

        self::$config = require_once(__DIR__.'/../config.php');

        // init Eloquent ORM
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => 'mysql',
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix' => ''
        ] + self::$config['db']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        date_default_timezone_set('UTC');
    }

    public static function url($relative_url) {
        return self::$config['base_url'] . $relative_url;
    }

    public static function run($request)
    {
        $routes = [
            '/' => function (/*$reques}t*/) {
                return App::json(Post::all());
            },

            '/post' => function(){
                return App::json(Post::find($_GET['id']));
            }
        ];

        foreach ($routes as $pattern => $handler) {
            if (strtok($request['url'], '?') == self::url($pattern)) {
                $response = $handler(/*$request*/);
                if (is_string($response)) {
                    $response = [
                        'code' => 200,
                        'headers' => [],
                        'body' => $response
                    ];
                }
                return $response;
            }
        }

        return [
            'code' => 404,
            'headers' => [],
            'body' => 'not found'
        ];
    }

    public static function json(ArrayAccess $data) {
        return [
            'code' => 200,
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($data)
        ];
    }
}
