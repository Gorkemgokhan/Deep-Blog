<div class="col-md-3">
    <div class="card">
        <div class="card-header" style="background-color: rgba(86,94,100,0.4)">
            Kategoriler
        </div>
        <div class="list-group" >
            @foreach($categories as $category)
                <li class="list-group-item @if(Request::segment(2)==$category->slug) active @endif">
                    <a href="{{route("category",$category->slug)}}" style="color: black">{{$category->name}}</a>
                    <span class="badge bg-danger text-white " style="float:right" >{{$category->articleCount()}}</span>
                </li>
            @endforeach
        </div>
    </div>
</div>
