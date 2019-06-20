<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Danh Sách Thể Loại
        </li>
        <div class="panel-group" id="accordion">
            @foreach($category as $cate)
                @if(count($cate->TypeOfNews) > 0)
                    <div>
                        <div>
                            <li class="list-group-item menu1 cate-list" data-toggle="collapse" data-parent="#accordion"
                                href="#{{$cate->name_slug}}">
                                {{ $cate->name }}
                            </li>
                        </div>
                        <div id="{{$cate->name_slug}}">
                            <ul>
                                @foreach($cate->TypeOfNews as $value)
                                    <li class="list-group-item">
                                        <a href="category/{{$value->id}}/{{ $value->name_slug.".html" }}">{{ $value->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </ul>
</div>
