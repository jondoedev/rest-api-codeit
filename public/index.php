<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__.'/../vendor/autoload.php';

App\App::init();

$request = [
    'url' => $_SERVER['REQUEST_URI'],
    'info' => $_SERVER,
    'params' => $_REQUEST
];
$response = App\App::run($request);

http_response_code($response['code']);
foreach ($response['headers'] as $key => $value) {
    header("$key: $value");
}
echo $response['body'];
