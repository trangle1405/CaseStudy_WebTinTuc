@section('title')
    {{ $news->title }}
@endsection

@extends('index')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('layout.menu')
        <!-- Blog Post Content Column -->
            <div class="col-md-6">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $news->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Admin</a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{asset('storage/images/'. $news->image)}}" alt="Hình ảnh của bài viết">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>
                    @if(!empty($news->created_at))
                        {{$news->created_at->format('Y.m.d H:i:s') }}
                    @else
                        {{ 'Không Xác Định' }}
                    @endif
                </p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                    {!! $news->summary !!}
                </p>

                <p>
                    {!! $news->content !!}
                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                			@if(Auth::user())
                				<div class="well">
                					<h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                					@if(count($errors) > 0)
                						@foreach($errors->all() as $err)
                						<div class="alert alert-danger" style="margin-top: 1em;">
                							<strong>{{ $err }}</strong><br/>
                						</div>
                						@endforeach
                					@endif

                					@if(session('message'))
                					<div class="alert alert-success">
                						<strong>{{ session('message') }}</strong>
                					</div>
                					@endif
                					<form role="form" method="POST" action="comment/{{ $news->id }}">
                						{{ csrf_field() }}
                						<div class="form-group">
                							<textarea name="content" class="form-control" rows="3"></textarea>
                						</div>
                						<button type="submit" class="btn btn-primary">Gửi</button>
                					</form>
                				</div>
                			@endif

                <hr>

                <!-- Posted Comments -->

                			@foreach($news->Comment as $comment)
                				<!-- Comment -->
                				<div class="media">
                					<a class="pull-left" href="#">
                						<img class="media-object" src="http://placehold.it/64x64" alt="">
                					</a>
                					<div class="media-body">
                						<h4 class="media-heading">
                							{{ $comment->User->name }} |
                							<small>{{$comment->created_at->format('Y.m.d H:i:s') }}</small>
                						</h4>
                						{{ $comment->content }}
                					</div>
                				</div>
                			@endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            		<div class="col-md-3">

            			<div class="panel panel-default">
            				<div class="panel-heading"><b>Tin liên quan</b></div>
            				<div class="panel-body">
            					@foreach($related_news as $news)
            						<!-- item -->
            						<div class="row" style="margin-top: 10px;">
            							<div class="col-md-5">
            								<a href="news/{{$news->id}}/{{ $news->title_slug }}.html">
            									<img class="img-responsive" src="{{asset('storage/images/'. $news->image)}}" alt="Hình ảnh của bài viết">
            								</a>
            							</div>
            							<div class="col-md-7">
            								<a href="news/{{$news->id}}/{{ $news->title_slug }}.html"><b>{{ $news->title }}</b></a>
            							</div>
            							<p class="sum-p">
            								{!! $news->summary !!}
            							</p>
            							<div class="break"></div>
            						</div>
            						<!-- end item -->
            					@endforeach
            				</div>
            			</div>

            			<div class="panel panel-default">
            				<div class="panel-heading"><b>Tin nổi bật</b></div>
            				<div class="panel-body">
            					@foreach($featured_new as $news)
            						<!-- item -->
            						<div class="row" style="margin-top: 10px;">
            							<div class="col-md-5">
            								<a href="news/{{$news->id}}/{{ $news->title_slug }}.html">
            									<img class="img-responsive" src="{{asset('storage/images/'. $news->image)}}" alt="Hình ảnh của bài viết">
            								</a>
            							</div>
            							<div class="col-md-7">
            								<a href="news/{{$news->id}}/{{ $news->title_slug }}.html"><b>{{ $news->title }}</b></a>
            							</div>
            							<p class="sum-p">
            								{!! $news->summary !!}
            							</p>
            							<div class="break"></div>
            						</div>
            						<!-- end item -->
            					@endforeach

            				</div>
            			</div>

            		</div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection