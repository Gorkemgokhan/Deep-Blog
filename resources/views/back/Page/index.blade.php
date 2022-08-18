@extends("back.layouts.master")
@section("title","Tüm Sayfalar")
@section("content")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@yield("title")</h6>
            <h6 class="m-0 font-weight-bold float-right text-primary">
                <span class="float-right">{{$pages->count()}} Aktif Makale </span><br>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" >
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Makale Başlığı</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                   <tbody>

                   @foreach($pages as $page)

                    <tr>
                        <td>
                            <img style=" width: 200px;height: auto;" src="/{{$page->image}}">
                        </td>
                        <td>{{$page->title}}</td>
                        <td>
                            <input class="switch" page-id="{{$page->id}}" type="checkbox" data-on="Aktif"  data-onstyle="success" data-offstyle="danger" data-off="Pasif" @if($page->status==1) checked @endif data-toggle="toggle">
                        <td>
                            <a target="_blank" href="{{route("page",$page->slug)}}" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route("admin.page.edit",$page->id)}}"title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route("admin.page.delete",$page->id)}}"title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>

                        </td>
                    </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.switch').change(function () {
               id=$(this)[0].getAttribute('page-id');
               statu=$(this).prop('checked');
                $.get("{{route('admin.page.switch')}}", {id:id,statu:statu}, function(data, status){
                    console.log(data);
                });
            });
        })
    </script>
@endsection
