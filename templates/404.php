<?php require_once __DIR__ . '/_header.php'; ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Custom CSS -->
    <link href="href="<?= App\App::url('/css/404.css') ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <!-- Preloader -->
    <section id="wrapper" class="container-fluid margin_15">
        <div class="logo col-md-offset-5">
            <a href="">
                <img src="/img/logo.png" alt="">
            </a>
        </div>
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="text-danger">404</h1>
                <h3>Page Not Found !</h3>
                <p class="text-muted m-t-30 m-b-30">MOST LIKELY THE PAGE YOU ARE LOOKING FOR THERE</p>
                <a href="<?= App\App::url('/') ?>" class="btn btn-danger btn-rounded m-b-40">Go Back Home</a> </div>
        </div>
    </section>
</body>
</html>