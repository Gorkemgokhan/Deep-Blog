@extends("front.layouts.master")
<title>Makale</title>
@section("content")

<div class="container px-4 px-lg-3">
    <div class="row gx-4  gx-lg-7 justify-content-center">
        @include("front.widgets.categoryWidget")
            <div  class="col-md-9 mx-auto">
                <h2 style="text-align: center">{!! $article->title !!}</h2>
                <img style="width:930px; height: 750px" ; src="{{$article->image}}"/>
                <br>
                {!! $article->content !!}
                <h5 href="{{$icerik->getCategory->name}}"> Konusu : {{$article->getCategory->name}}</h5>
                <h5> Görüntülenme : {{$article->hit}}</h5>
            </div>
    </div>
</div>

@endsection


