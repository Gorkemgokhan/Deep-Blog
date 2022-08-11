@extends("front.layouts.master")
<title>Katagoriler</title>
@section("content")
    @if(count($icerikler)>0)

    <div class="container px-4 px-lg-3">
        <div class="row">
            @include("front.widgets.categoryWidget")
            <div class="col-md-9">

                @foreach($icerikler as $icerik)
                    <div  class="post-preview">
                        <p class="post-meta">
                            <a href="{{route("single",[$icerik->getCategory->slug,$icerik->slug])}}">
                        <h2 style="text-align: center" class="post-title">{{$icerik->title}}</h2>
                        <img style="width:970px; height: 730px"; src="{{$icerik->image}}"/>
                         <h4  class="post-subtitle">{{Str::limit($icerik->content,70)}}</h4></a>
                         <h6 >Konusu: {{$icerik->getCategory->name}}</h6>
                         <h6 class="float-right">Oluşturulma Tarihi: {{$icerik->created_at->diffForHumans()}}</h6>
                        <h6>Görüntülenme : {{$icerik->hit}}</h6>
                        </p>

                    </div>


                @endforeach
                    <div class="d-flex justify-content-center"> {{$icerikler->links()}}</div>
            </div>
        </div>
        </div>
    @else
        <div class="alert alert-danger" style="text-align: center">
            <h2>Bu kategoriye ait Makale bulunmamaktadır.</h2>
        </div>
    @endif

@endsection
