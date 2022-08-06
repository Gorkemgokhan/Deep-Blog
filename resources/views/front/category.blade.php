@extends("front.layouts.master")
<title>Katagoriler</title>
@section("content")
    <div class="container px-4 px-lg-5">
        <div class="row">
            @include("front.widgets.categoryWidget")
            <div class="col-md-9">

                @foreach($icerikler as $icerik)
                    <div class="post-preview">
                        <p class="post-meta">
                            <a href="{{route("single",[$icerik->getCategory->slug,$icerik->slug])}}">
                        <h2 style="text-align: center" class="post-title">{{$icerik->title}}</h2>
                        <img src="{{$icerik->image}}"/>
                         <h4  class="post-subtitle">{{Str::limit($icerik->content,70)}}</h4></a>


                            <a >Konusu:{{$icerik->getCategory->name}}</a>
                            <span class="float-right">Oluşturulma Tarihi: {{$icerik->created_at->diffForHumans()}}
                <br></span>
                        </p>
                    </div>
                    <h5>Görüntülenme : {{$icerik->hit}}</h5>

                @endforeach
                <hr class="my-4"/>
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase"
                                                                style="text-align: center" href="#!">Sonraki Sayfa→</a>
                </div>
            </div>
        </div>
        </div>

@endsection
