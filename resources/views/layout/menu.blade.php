
<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        <li href="#" class="list-group-item menu1 active">
            Danh Sách Thể Loại
        </li>
        @foreach($category as $cate)
            @if(count($cate->TypeOfNews) > 0)
                <li class="list-group-item menu1 cate-list">
                    {{ $cate->name }}
                </li>
                <ul>
                    @foreach($cate->TypeOfNews as $value)
                        <li class="list-group-item">
                            <a href="category/{{$value->id}}/{{ $value->name_slug.".html" }}">{{ $value->name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>
