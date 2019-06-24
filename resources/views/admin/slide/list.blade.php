@extends('admin.layout.index')

@section('content')
    <script src="admin_asset/dist/js/extra.js"></script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý Slider
                        <small>> Danh Sách</small>
                    </h1>
                </div>
                <div class="clearfix"></div>
                @if(session('message'))
                    <div class="alert alert-success">
                        <strong>{{ session('message') }}</strong>
                    </div>
            @endif
            <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Tên Slide</th>
                        <th class="text-center">Nội Dung Slide</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Link</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($slide as $value)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->content }}</td>
                            <td>
                                <img width="200px" src="upload/slide/{{ $value->image }}">
                            </td>
                            <td>{{ $value->link }}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="admin/slide/edit/{{ $value->id }}">Sửa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="admin/slide/delete/{{ $value->id }}"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection