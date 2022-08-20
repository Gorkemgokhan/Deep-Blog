@extends("back.layouts.master")
@section("title","Ayarlar")
@section("content")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield("title")</h6>
        </div>
        <form method="post" action="{{route("admin.config.update")}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Site Başlığı</label>
                        <input type="text" name="title" required class="form-control" value="{{$config->title}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Site Yayın Durumu</label>
                        <select class="form-control" name="active">
                            <option @if($config->active==1) selected @endif value="1">Aktif</option>
                            <option @if($config->active==0) selected @endif value="0">Pasif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Site Logo</label>
                        <input type="file" class="form-control" name="logo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Site Favicon</label>
                        <input type="file" class="form-control" name="favicon">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="{{$config->facebook}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Twiter</label>
                        <input type="text" class="form-control" name="twitter" value="{{$config->twitter}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Github</label>
                        <input type="text" class="form-control" name="github" value="{{$config->github}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>linkedin</label>
                        <input type="text" class="form-control" name="linkedin" value="{{$config->linkedin}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Youtube</label>
                        <input type="text" class="form-control" name="youtube" value="{{$config->youtube}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>İnstagram</label>
                        <input type="text" class="form-control" name="instagram" value="{{$config->instagram}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-md btn-success">Güncelle</button>
            </div>
        </form>
        <div class="card-body">
            <div class="table-responsive">

            </div>
        </div>
    </div>

@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
