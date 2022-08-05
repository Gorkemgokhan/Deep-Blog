@extends("front.Layoyts.master")
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
    <img src="/Front/assets/img/banner-gb1f328ef4_1920.jpg" style="width:100%; height: 100vh;" alt="">
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
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.html" style="color: gray">Ana Sayfa</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.html" style="color: gray">Hakkında</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.html" style="color: gray">Gönderiler</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.html" style="color: gray">İletişim</a></li>
                </svg>
            </ul>
        </div>
    </div>
</nav>
<!-- Page Header-->

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
    @section("content")
            @include("front.widgets.categoryWidget")
    <div class="col-md-9">
        @foreach($icerikler as $icerik)
        <div class="post-preview">
            <a href="{{route("single",[$icerik->getCategory->slug,$icerik->slug])}}">
                <h2 style="text-align: center" class="post-title">{{$icerik->title}}</h2>
                <img src="{{$icerik->image}}" />
                <h4 class="post-subtitle">{{Str::limit($icerik->content,70)}}</h4>
            </a>
            <p class="post-meta">
                Konusu:
                <a href="#!">{{$icerik->getCategory->name}}</a>
                <span class="float-right">Oluşturulma Tarihi: {{$icerik->created_at->diffForHumans()}}
                <br></span>
            </p>
        </div>
            <h5>Görüntülenme : {{$icerik->hit}}</h5>
        @if(!$loop->last)
            <hr>
        @endif
        @endforeach
        <hr class="my-4"/>
        <div class="d-flex justify-content-end mb-4" ><a class="btn btn-primary text-uppercase" style="text-align: center" href="#!">Sonraki Sayfa→</a></div>
    </div>

@endsection


