@extends("back.layouts.master")
@section("title","Silinen Makaleler")
@section("content")

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Geri Dönüşüm</h6>
            <h6 class="m-0 font-weight-bold float-right text-primary">
                <span class="float-right">{{$articles->count()}} Silinmiş Makale</span><br>
                <a href="{{route("admin.makaleler.index")}}" class="btn btn-primary btn-sm"><i class="fa fa-trash "> Yayındaki Makaleler</i></a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" >
                    <thead>
                    <tr>
                        <th>Fotoğraf</th>
                        <th>Makale Başlığı</th>
                        <th>Kategori</th>
                        <th>İçerik</th>
                        <th>Görüntülenme Sayısı</th>
                        <th>Paylaşılma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($articles as $article)

                        <tr>
                            <td>
                                <img style=" width: 200px;height: auto;" src="/{{$article->image}}">
                            </td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->content}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route("admin.recover.article",$article->id)}}"title="Geri Ekle" class="btn btn-sm btn-success"><i class="fa fa-recycle"></i></a>
                                <a href="{{route("admin.hard.delete.article",$article->id)}}"title="Sil" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

