@extends("front.layouts.master")
@section("content")
    @if(count($icerikler)>0)
<div class="container px-4 px-lg-3" style="background:#FEFFFF" >
    <div class="row gx-4 gx-lg-2 justify-content-center">
            @include("front.widgets.categoryWidget")
            <div class="col-md-9" >
                @foreach($icerikler as $icerik)
                    <div class="post-preview">
                        <a href="{{route("single",[$icerik->getCategory->slug,$icerik->slug])}}">
                            <h2 style="text-align: center" class="post-title">{{$icerik->title}}</h2>
                            <img style=" max-width: 100%;height: auto;" src="{{$icerik->image}}"/>
                            <h5 class="post-subtitle">{{Str::limit($icerik->content,70)}}</h5>
                        </a>
                        <p class="post-meta">
                            Konusu:
                            <a href="#!">{{$icerik->getCategory->name}}</a><br>
                            <span class="float-right" style="color:#17252A">Oluşturulma Tarihi: {{$icerik->created_at->diffForHumans()}}
                <br></span>
                        </p>
                    </div>
                    <h5>Görüntülenme : {{$icerik->hit}}</h5>
                    @if(!$loop->last)
                        <hr>
                    @endif
                @endforeach
                <div class="d-flex justify-content-center"> {{$icerikler->links()}}</div>
                </div>
            </div>
    @else
        <div class="alert alert-danger" style="text-align: center">
            <h1>Bu kategoriye ait Makale bulunmamakta.</h1>
        </div>
    @endif
    </div>
</div>
@endsection
