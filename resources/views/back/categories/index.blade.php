@extends("back.layouts.master")
@section("title","Kategoriler")
@section("content")
<div class="row">
    <div class="col-md-4"style="background:#2d4373">
        <div class="col-mb-4" >
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" >Yeni Kategory oluştur</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.category.create')}}">
                    @csrf
                    <div class="from-group">
                    <label style="color: white">Kategori Adı</label>
                        <input type="text" class="form-control" name="category" required >
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8" style="background:#2d3748">
        <div class="col-mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" >
                        <thead>
                        <tr>
                            <th>Kategori Adı</th>
                            <th>Makale Sayısı</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)

                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->articleCount()}}</td>
                                <td>
                                    <input class="switch" category-id="{{$category->id}}" type="checkbox" data-on="Aktif"  data-onstyle="success" data-offstyle="danger" data-off="Pasif" @if($category->status==1) checked @endif data-toggle="toggle">
                                <td>
                                    <a category-id="{{$category->id}}" class="btn btn-sm btn-primary edit-click" title="Kategoryi Düzenle"><i class="fa fa-edit text-white"></i></a>
                                    <a category-id="{{$category->id}}" category-count="{{$category->articleCount()}}" class="btn btn-sm btn-danger remove-click" title="Kategoryi Sil"><i class="fa fa-times text-white"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="editModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title -align-center" style="color:#282828" >Kategori Düzenle</h4>
                <button type="button" class="close" style="text-align: right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" >
                <form method="post" action="{{route("admin.category.update")}}">
                    @csrf
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input id="category" type="text" class="form-control" name="category" >
                        <input type="hidden" name="id" id="category_id">
                    </div>
                    <div class="form-group">
                        <label>Kategori Slug</label>
                        <input id="slug" type="text" class="form-control" name="slug" >
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Kaydet</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="color:#282828" >Kategori Sil</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                <div class="modal-body">
                <div id="articleAlert"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-success">Sil</button>
                </div>
        </div>
    </div>
</div>
@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src=" https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $(".remove-click").click(function (){
                id=$(this)[0].getAttribute('category-id');
                count=$(this)[0].getAttribute('category-count');
                    if(count<!0){
                        $('#articleAlert').val('Bu kategoride '+count+' makale bulunmaktadır.Silmek istediğinize emin misiniz ?'); }
                });
            $(".edit-click").click(function (){
                id=$(this)[0].getAttribute('category-id');
                $.ajax({
                    type:"GET",
                    url:"{{route("admin.category.getdata")}}",
                    data:{id:id},
                    success:function (data) {
                        console.log(data);
                        $("#category").val(data.name);
                        $("#slug").val(data.slug);
                        $("#category_id").val(data.id);
                        $("#editModal").modal();
                    }
                })
            });
            $('.switch').change(function () {
                id=$(this)[0].getAttribute('category-id');
                statu=$(this).prop('checked');

                $.get("{{route('admin.category.switch')}}", {id:id,statu:statu}, function(data, status){
                });
            });
        })
    </script>
@endsection
