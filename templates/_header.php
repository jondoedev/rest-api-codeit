<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CodeIT | REST API</title>


    <!-- CSS -->
    <link rel="stylesheet" href="<?= App\App::url('/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= App\App::url('/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= App\App::url('/css/main.css') ?>">




</head>
<body>

<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header" style="margin-top: 25px;">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= App\App::url('/') ?>"><img src="img/logo.png" style="max-height: 100%"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="margin-top: 15px;">
                        <li><a href="<?= App\App::url('/posts') ?>">
                                <button type="submit" class="btn btn-primary col-md-offset-1">All Posts</button>
                            </a></li>
                </ul>
            </div>
        </div>
    </nav>

</header>

<div class="container">