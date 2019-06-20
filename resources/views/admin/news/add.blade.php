@extends('admin.layout.index')

@section('content')
    <script src="admin_asset/dist/js/extra.js"></script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
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
                    <form action="admin/news/add" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <p><label>Chọn Thể Loại</label></p>
                            <select class="form-control input-width catefield" name="category_id" id="category" value="{{old('category_id')}}">
                                @foreach($category as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <p><label>Chọn Loại Tin</label></p>
                            <select class="form-control input-width subcatefield" name="typeOfNews_id" id="typeOfNews" value="{{old('typeOfNews_id')}}">

                            </select>
                        </div>

                        <div class="form-group">
                            <p><label>Tiêu Đề</label></p>
                            <input type="text" class="form-control input-width" name="title"
                                   placeholder="Nhập Tiêu Đề Tin Tức" value="{{ old('title') }}"/>
                        </div>

                        <div class="form-group">
                            <p><label>Tóm Tắt Nội Dung</label></p>
                            <textarea name="summary" id="demo" class="form-control ckeditor" rows="3">
                                    {{ old('summary') }}
                                </textarea>
                        </div>

                        <div class="form-group">
                            <p><label>Nội Dung Bài Viết</label></p>
                            <textarea name="content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ old('content') }}
                                </textarea>
                        </div>

                        <div class="form-group">
                            <p><label>Thêm Hình Ảnh</label></p>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <p><label>Tin Tức Nổi Bật?</label></p>
                            <label class="radio-inline">
                                <input name="featured_news" value="1" checked="" type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="featured_news" value="0" type="radio">Không
                            </label>
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
@section('script')
    <script>
        $(document).ready(function () {
            $("#category").change(function () {
                let category_id = $(this).val();
                $.get("admin/ajax/typeOfNews/" + category_id, function (data) {

                    $("#typeOfNews").html(data);
                })
            })
        })
    </script>
@endsection