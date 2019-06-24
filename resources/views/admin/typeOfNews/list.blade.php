@extends('admin.layout.index')

@section('content')
    <script src="admin_asset/dist/js/extra.js"></script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Tin
                        <small>> Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="clearfix"></div>
                @if(session('message'))
                    <div class="alert alert-success">
                        <strong>{{ session('message') }}</strong>
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Tên Loại Tin</th>
                        <th class="text-center">Tên Không Dấu</th>
                        <th class="text-center">Tên Thể Loại</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($typeOfNews as $value)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->name_slug }}</td>
                            <td>{{ $value->Category->name }}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                        href="admin/typeOfNews/edit/{{ $value->id }}">Sửa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                        href="admin/typeOfNews/delete/{{ $value->id }} "
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

    <!-- Modal -->
    <!-- Modal -->

@endsection