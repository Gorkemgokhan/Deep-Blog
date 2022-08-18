@extends("back.layouts.master")
@section("title",$page->title.' Sayfasını Güncelle')
@section("content")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield("title")</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
    <form method="post" action="{{route("admin.page.edit.post",$page->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Makale Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{$page->title}}" required>
                </div>
                <div class="form-group">
                    <label>İçerik Fotoğrafı</label>
                    <input type="file" name="image" class="form-control" >
                    <img src="{{asset($page->image)}}" class="img-thumbnail"  width="300">
                </div>
                <div class="form-group" >
                    <label>İçerik</label>
                    <textarea name="content"  class="form-control"  rows="4">{!! $page->content !!}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sayfayı Güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection

