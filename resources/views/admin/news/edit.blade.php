@extends('admin.layout.index')

@section('content')
    <script src="admin_asset/dist/js/extra.js"></script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
                        <small>>{{$news->title}}</small>
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
                    <form action="admin/news/edit/{{$news->id}}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <p><label>Chọn Thể Loại</label></p>
                            <select class="form-control input-width catefield" name="category_id" id="category">
                                @foreach($category as $value)
                                    <option {{ $news->TypeOfNews->category_id == $value->id ? 'selected' : '' }}

                                            value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <p><label>Chọn Loại Tin</label></p>
                            <select class="form-control input-width subcatefield" name="typeOfNews_id" id="typeOfNews">
                                @foreach($typeOfNews as $value)
                                    <option {{ $news->typeOfNews_id == $value->id ? 'selected' : '' }}

                                            value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <p><label>Tiêu Đề</label></p>
                            <input type="text" class="form-control input-width" name="title"
                                   placeholder="Nhập Tiêu Đề Tin Tức" value="{{ $news->title  }}"/>
                        </div>

                        <div class="form-group">
                            <p><label>Tóm Tắt Nội Dung</label></p>
                            <textarea name="summary" id="demo" class="form-control ckeditor" rows="3">
                                    {{ $news->summary }}
                                </textarea>
                        </div>

                        <div class="form-group">
                            <p><label>Nội Dung Bài Viết</label></p>
                            <textarea name="content" id="demo" class="form-control ckeditor" rows="3">
                                    {{ $news->content }}
                                </textarea>
                        </div>

                        <div class="form-group">
                            <p><label>Thêm Hình Ảnh</label></p>
                            <p><img width="200px" src="{{asset('storage/images/'. $news->image)}}"></p>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <p><label>Tin Tức Nổi Bật?</label></p>
                            <label class="radio-inline">
                                <input name="featured_news" {{$news->featured_news == 1 ? 'Checked':''}} value="1"
                                       checked="" type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="featured_news" {{$news->featured_news == 0 ? 'Checked':''}} value="0"
                                       type="radio">Không
                            </label>
                        </div>

                        <button type="submit" class="btn btn-default">sua</button>
                        <button type="reset" class="btn btn-default btn-mleft">Nhập Lại</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Tên Người Bình Luận</th>
                        <th class="text-center">Nội Dung</th>
                        <th class="text-center">Ngày Đăng</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news->Comment as $value)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->User->name }}</td>
                            <td>{{ $value->content }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                        href="admin/comment/delete/{{ $value->id }}/{{$news->id}}"  onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#category").change(function () {
                var category_id = $(this).val();
                $.get("admin/ajax/typeofnews/" + category_id, function (data) {

                    $("#typeOfNews").html(data);
                })
            })
        })
    </script>
@endsection
