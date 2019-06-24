@section('title')
    Trang Chủ
@endsection

@extends('index')

@section('content')
    <!-- Page Content -->
    <div class="container">

        @include('layout.slide')

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.menu')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h2 style="margin-top:0px; margin-bottom:0px;">Tin Mới</h2>
                    </div>

                    <div class="panel-body">
                    @foreach($category as $cate)
                        @if(count($cate->TypeOfNews) > 0)
                            <!-- item -->
                                <div class="row-item row">
                                    <h3>
                                        <a class="cate-list">{{ $cate->name }}</a> |
                                        @foreach($cate->TypeOfNews as $typeOfNews)
                                            <small>
                                                <a href="category/{{$typeOfNews->id}}/{{ $typeOfNews->name_slug.".html" }}"><i>{{ $typeOfNews->name }}</i></a>/
                                            </small>
                                        @endforeach
                                    </h3>
                                    <?php
                                    $data = $cate->News->where('featured_news', 1)->sortByDesc('created_at')->take(5);
                                    $news_one = $data->shift();
                                    ?>
                                    <div class="col-md-8 border-right">
                                        <div class="col-md-5">
                                            <a href="news/{{$news_one['id']}}/{{ $news_one['title_slug'] }}.html">
                                                <img class="img-responsive"
                                                     src="upload/tintuc/{{ $news_one['image'] }}"
                                                     alt="Hình ảnh đại diện của bài viết">
                                            </a>
                                        </div>

                                        <div class="col-md-7">
                                            <h3>
                                                <a href="news/{{$news_one['id']}}/{{ $news_one['title_slug'] }}.html">{{ $news_one['title'] }}</a>
                                            </h3>
                                            <p>{!! $news_one['summary'] !!}</p>
                                            <a class="btn btn-primary"
                                               href="news/{{$news_one['id']}}/{{ $news_one['title_slug'] }}.html">Xem
                                                Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </div>

                                    </div>


                                    <div class="col-md-4">
                                        @foreach($data->all() as $news)
                                            <a href="news/{{$news['id']}}/{{ $news['title_slug'] }}.html">
                                                <h4>
                                                    <span class="glyphicon glyphicon-list-alt"></span>
                                                    {{ $news['title'] }}
                                                </h4>
                                            </a>
                                        @endforeach
                                    </div>

                                    <div class="break"></div>
                                </div>
                                <!-- end item -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection