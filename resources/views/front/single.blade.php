@extends("front.layouts.master")
<title>Makale</title>
@section("content")
<div class="container px-4 px-lg-3">
    <div class="row gx-4  gx-lg-7 justify-content-center">
        @include("front.widgets.categoryWidget")
            <div class="col-md-9 mx-auto">
                <h2 style="text-align: center">{!! $article->title !!}</h2>
                <img style=" max-width: 100%;height: auto;" ; src="/{{$article->image}}"/>
                <br>
                {!! $article->content !!}
                <br>
                <h7 > Konusu : {{$article->getCategory->name}}</h7>
                <br>
                <i style="color: red"> Görüntülenme : {{$article->hit}}</i>
            </div>
    </div>
</div>

@endsection


