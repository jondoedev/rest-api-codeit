<?php

namespace App;

use ArrayAccess;
use Illuminate\Database\Capsule\Manager as Capsule;

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
        $routes = require_once __DIR__.'/routes.php';

        foreach ($routes as $pattern => $handler) {
            $url_without_params = strtok($request['url'], '?');
            $pattern = '/^' . str_replace('/', '\/', self::url($pattern)) . '$/';
            $matches = [];
            preg_match($pattern, $url_without_params, $matches);

            if ($matches) {
                $args = array_merge([$request], array_slice($matches, 1));
                $response = call_user_func_array($handler, $args);

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
    public static function render($path)
    {
        ob_start();
        require_once __DIR__ . "/../templates/$path.php";
        $output = ob_get_clean();
        return $output;
    }
}
