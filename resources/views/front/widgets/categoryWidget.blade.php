<div class="col-md-5">
    <div class="card">
        <div class="card-header" style="background-color: rgba(86,94,100,0.4)">
            Kategoriler
        </div>
        <div class="list-group" >
            @foreach($categories as $category)
                <li class="list-group-item">
                    <a href="#" style="color: black">{{$category->name}}</a> <span class="badge bg-danger " style="float: right" >12</span>
                </li>
            @endforeach
        </div>
    </div>
</div>
