<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Anasayfa</title>

    <link rel="icon" type="image/x-icon" href="Front/assets/Glogo.ico">

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous" ></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset("Front/")}}/css/styles.css" rel="stylesheet" />
    <img src="/Front/assets/img/banner-gb1f328ef4_1920.jpg" style="width:100%; height: 400px;" >
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="http://localhost:8000" >Getucon Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                @foreach($pages as $page)
                <li class="nav-item">
                    <a class="nav-link px-lg-3 py-3 py-lg-9" href="{{route("page",$page->slug)}}">{{$page->title}}</a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</nav>
<!-- Page Header-->
