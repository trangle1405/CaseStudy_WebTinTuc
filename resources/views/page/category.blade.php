@section('title')
    {{ $typeOfNews->name }}
@endsection

@extends('index')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{ $typeOfNews->name }}</b></h4>
                    </div>

                    @foreach($news as $value)
                        <div class="row-item row">
                            <div class="col-md-3">
                                <br>
                                <img width="200px" height="200px" class="img-responsive"
                                     src="upload/tintuc/{{ $value->image }}" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3>
                                    <a href="news/{{$value['id']}}/{{ $value['title_slug'] }}.html">{{ $value->title }}</a>
                                </h3>
                                <p>{!! $value->summary !!}</p>
                                <a class="btn btn-primary" href="news/{{$value['id']}}/{{ $value['title_slug'] }}.html">Xem
                                    Thêm.. <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <div class="break"></div>
                        </div>
                @endforeach

                <!-- Pagination -->
                    <div class="row text-center">
                        {{ $news->links() }}
                    </div>
                    <!-- /.row -->

                </div>
            </div>

        </div>

    </div>
    <!-- end Page Content -->

@endsection
