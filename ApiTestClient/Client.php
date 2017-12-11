<?php
namespace Client;
class Client
{
    /**
     * get all existing posts
     */
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

    /**
     * @param $id
     * @return mixed
     *
     * get single post by id
     */
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
    public static function createPost($request)
    {
        $data = json_encode($request);
//        $newpost = ['title' => $title, 'content' => $content, 'author' => $author];
        $url = curl_init("http://192.168.1.199/dmitry.kalenyuk/rest-api-codeit/public/posts/create");
        curl_setopt($url, CURLOPT_USERPWD, "root:root");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_POST, 1);
        curl_setopt($url, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($url);
        curl_close($url);

        echo $response;
        return $response;
    }

    public static function deletePost($id)
    {
        $url = curl_init("http://192.168.1.199/dmitry.kalenyuk/rest-api-codeit/public/posts/delete/".$id);
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($url, CURLOPT_USERPWD, "root:root");
        $response = curl_exec($url);
        curl_close($url);
        echo $response;
        return $response;
    }

    public static function editPost($request)
    {
        $data = json_encode($request);
        $url = curl_init("http://192.168.1.199/dmitry.kalenyuk/rest-api-codeit/public/posts/edit/54");

        ob_start();
//        echo "<pre>";
//        $out = fopen('php://output', 'w');

        curl_setopt($url, CURLOPT_USERPWD,"root:root");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_HTTPHEADER, array('Content-Type: application/json',));
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($url, CURLOPT_POSTFIELDS, $data);
//        curl_setopt($url, CURLOPT_VERBOSE, true);
//        curl_setopt($url, CURLOPT_STDERR, $out);

        $response = curl_exec($url);

//        fclose($out);

        curl_close($url);
        echo $response;
//        echo "</pre>";
        return $response;
    }

}