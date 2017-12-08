<?php

namespace App;

use App\Models\User;
use ArrayAccess;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Rakit\Validation\Validator;

class App
{
    public static $config;

    /**
     * Initing the application:
     * Connectiong to desired DB (configure it up 'config.php')
     */
    public static function init()
    {
//        session_start();

        self::$config = require_once(__DIR__ . '/../config.php');
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

    public static function url($relative_url)
    {
        return self::$config['base_url'] . $relative_url;
    }

    public static function run($request)
    {
        $routes = require_once __DIR__ . '/routes.php';

        foreach ($routes as $route) {
            $pattern = $route['pattern'];
            $handler = $route['handler'];
            $method = $route['method'];

            $url_without_params = strtok($request['url'], '?');
            $pattern = '/^' . str_replace('/', '\/', self::url($pattern)) . '$/';
            $matches = [];
            preg_match($pattern, $url_without_params, $matches);

            if ($matches && ($request['method'] == $method)) {
                $args = array_merge([$request], array_slice($matches, 1));
                try {
                    $response = call_user_func_array($handler, $args);

                    if (is_string($response)) {
                        $response = [
                            'code' => 200,
                            'body' => $response
                        ];
                    }
                    return $response;
                } catch (ModelNotFoundException $e) {
                    return [
                        'code' => 404,
                        'body' => 'not found'
                    ];
                }
            }
        }

        return [
            'code' => 404,
            'body' => App::render('404')
        ];
    }

    /**
     * @param ArrayAccess $data
     * @return array
     * This method allows us to work with noArray objects as with Arrays using ArrayAccess
     * It will setting response code and HTTP header.
     * Will return data in json encoding
     */
    public static function json(ArrayAccess $data)
    {
        return [
            'code' => 200,
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($data)
        ];
    }

    /**
     * Improving convenient views rendering
     */
    public static function render($path)
    {
        ob_start();
        require_once __DIR__ . "/../templates/$path.php";
        $output = ob_get_clean();
        return $output;
    }

    /**
     * Improving validation of data, that will be transfered in request body
     * to avoid the presence of empty columns in DB
     */
    public static function Validator($request, $rules)
    {

        $request = $request['json'];
        $validator = new Validator;
        $validation = $validator->validate($request, $rules);
        if ($validation->fails()) {
            // handling errors
            $errors = $validation->errors->firstOfAll();
            foreach ($errors as $error) {
                echo '<pre>' . $error . '</pre>';
            }
            exit;
        } else {
            // validation passes
            echo "Success!";
        }
    }

    //TODO: Try to fix "Notice: Undefined index: PHP_AUTH_USER and PHP_AUTH_PW"
    //TODO: Replase credentials settings to config.php
    /**
     * Improving Authentification by header
     */
    public static function headerAuth()
    {
        //setting login credentials
        $credentials = [
            'login' => 'root',
            'pwd' => 'root'
        ];

        /**
         * Checking login credentials
        */
        if ($_SERVER['PHP_AUTH_USER'] !== $credentials['login'] or $_SERVER['PHP_AUTH_PW'] !== $credentials['pwd']) {
            header('HTTP/1.1  Unauthorized');
            header('WWW-Authenticate: Basic realm= "PHP REST API"');
            http_response_code(401);
            unset($credentials);
            exit  ('Invalid Login Credentials');
        }

        }

    public static function tokenCreate(){
        $token = md5(uniqid(mt_rand(),true));
        return $token;
    }



}
