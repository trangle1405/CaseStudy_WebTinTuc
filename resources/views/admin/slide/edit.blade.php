@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>> {{ $slide->name }}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                <strong>{{$err}}</strong><br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            <strong>{{session('error')}}</strong>
                        </div>
                    @endif

                    @if(session('message'))
                        <div class="alert alert-success">
                            <strong>{{session('message')}}</strong>
                        </div>
                    @endif
                    <form action="admin/slide/edit/{{ $slide->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <p><label>Tên</label></p>
                            <input type="text" class="form-control input-width" name="name" value="{{ $slide->name }}" />
                        </div>

                        <div class="form-group">
                            <p><label>Nội Dung</label></p>
                            <textarea name="content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ $slide->content }}
                                </textarea>
                        </div>

                        <div class="form-group">
                            <p><label>Đường Dẫn</label></p>
                            <input type="text" class="form-control input-width" name="link" value="{{ $slide->link }}" />
                        </div>

                        <div class="form-group">
                            <p><label>Ảnh hiện tại</label></p>
                            <p><img width="200px" src="{{asset('storage/images/'. $slide->image)}}"></p>
                            <p><label>Chọn Hình Ảnh khác</label></p>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <button type="submit" class="btn btn-default">Thực hiện</button>
                        <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection