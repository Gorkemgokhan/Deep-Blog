@extends("front.layouts.master")
<title>Makale</title>
@section("content")

<div class="container px-3 px-lg-1">
    <div class="row gx-4  gx-lg-7 justify-content-center">
        @include("front.widgets.categoryWidget")
            <div class="col-md-7 mx-auto">
                <img style="width:890px; height: 660px" ; src="{{$article->image}}"/>
                <br>
                {!! $article->content !!}
                <h5> Görüntülenme : {{$article->hit}}</h5>
            </div>
    </div>
</div>

@endsection


