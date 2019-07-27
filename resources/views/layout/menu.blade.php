<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Danh Sách Thể Loại
        </li>
        <div id="accordion" >
            @foreach($category as $cate)
                @if(count($cate->TypeOfNews) > 0)
                    <div class="card">
                        <div class="card-header" id="{{$cate->name_slug.$cate->id}}">
                            <ul class="list-group-item menu1 cate-list collapse " data-toggle="collapse"
                                data-target="#{{$cate->name_slug}}"
                                aria-expanded="false"
                                aria-controls="{{$cate->name_slug}}">{{ $cate->name }}
                            </ul>
                        </div>
                        <div id="{{$cate->name_slug}}"
                             class="collapse"
                             aria-labelledby="{{$cate->name_slug.$cate->id}}"
                             data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    @foreach($cate->TypeOfNews as $value)
                                        <li class="list-group-item">
                                            <a href="category/{{$value->id}}/{{ $value->name_slug.".html" }}">{{ $value->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </ul>
</div>

