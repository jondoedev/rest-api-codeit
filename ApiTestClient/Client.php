<?php
namespace Client;
class Client
{

    public static function fetchAll()
    {
        $url = curl_init("http://192.168.1.199/dmitry.kalenyuk/rest-api-codeit/public/posts");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($url, CURLOPT_USERPWD, "root:root");
        $response = curl_exec($url);
        curl_close($url);
        echo $response;
        return $response;
    }

    public static function fetchID($id)
    {
        $url = $url = curl_init("http://192.168.1.199/dmitry.kalenyuk/rest-api-codeit/public/posts/".$id);
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($url, CURLOPT_USERPWD, "root:root");
        $response = curl_exec($url);
        curl_close($url);
        echo $response;
        return $response;
    }

    //TODO: make it work!!!
    public static function createPost()
    {

        $newpost = ['title' => 'titleCURL', 'content' => 'content', 'author' => 'author'];
        $url = curl_init("http://192.168.1.199/dmitry.kalenyuk/rest-api-codeit/public/posts/create");
        curl_setopt($url, CURLOPT_USERPWD, "root:root");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_POSTFIELDS, $newpost);
        $response = curl_exec($url);
        curl_close($url);
        echo $response;
        return $response;
    }

}