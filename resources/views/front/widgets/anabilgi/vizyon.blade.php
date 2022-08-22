@extends("front.layouts.master")
@section("title",$page->title)
@section("bg",$page->image)
@section("content")
    <div class="col-lg-8 col-md-10 mx-auto" style="text-align: center">
        <h3 style="color: blue">{!! $page->title !!}</h3><br>
        {!!   $page->content  !!}
    </div>
@endsection



