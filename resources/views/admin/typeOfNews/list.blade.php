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
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/typeofnews/edit/{{ $value->id }}">Sửa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/typeofnews/delete/{{ $value->id }} "  onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
{{--                            <td class="center">--}}
{{--                                <i class="fa fa-trash-o fa-fw"></i>--}}
{{--                                <input type="hidden" class="hiddenID" value="{{ $value->id }}">--}}

{{--                                <a href="#" class="btnDel" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$value->id}}">Xóa</a>--}}

{{--                                <div style="text-align: left;" id="myModal{{$value->id}}" class="modal fade" role="dialog">--}}
{{--                                    <div class="modal-dialog">--}}

{{--                                        <!-- Modal content-->--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                                                <h4 class="modal-title">Xác Nhận</h4>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <p>Bạn muốn xóa Loại Tin: "{{$value->Ten}}"?</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-footer">--}}
{{--                                                <button type="button" data-casetype="loaitin" class="btn btn-default btnConf">Có</button>--}}
{{--                                                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
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