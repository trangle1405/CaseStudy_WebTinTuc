@extends('admin.layout.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>> Thêm</small>
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
                    <form action="admin/slide/add" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <p><label>Tên</label></p>
                            <input type="text" class="form-control input-width" name="name" placeholder="Nhập Tên của Slide" value="{{ old('name') }}" />
                        </div>

                        <div class="form-group">
                            <p><label>Nội Dung</label></p>
                            <textarea name="content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ old('content') }}
                                </textarea>
                        </div>

                        <div class="form-group">
                            <p><label>Đường Dẫn</label></p>
                            <input type="text" class="form-control input-width" name="link" placeholder="Nhập Đường dẫn URL cho Slide (có thể bỏ qua)" value="{{ old('link') }}" />
                        </div>

                        <div class="form-group">
                            <p><label>Thêm Hình Ảnh</label></p>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection