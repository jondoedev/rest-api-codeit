<?php
require_once __DIR__.'/Client.php';
use Client\Client as Client;

$data = [
    'title' => 'TEST',
    'content' => 'TESTTEST',
    'author' => 'TESTTEST'];
//Client::createPost($data);
//Client::createPost($data);
Client::fetchAll();