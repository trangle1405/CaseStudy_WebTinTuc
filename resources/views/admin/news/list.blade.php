@extends('admin.layout.index')

@section('content')
    <script src="admin_asset/dist/js/extra.js"></script>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
                        <small>> Danh Sách</small>
                    </h1>
                </div>
                <div class="clearfix"></div>
                <!-- /.col-lg-12 -->
                @if(session('message'))
                    <div class="alert alert-success">
                        <strong>{{session('message')}}</strong>
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Tiêu Đề </th>
                        <th class="text-center">Tóm Tắt</th>
                        <th class="text-center">Thể Loại</th>
                        <th class="text-center">Loại Tin</th>
                        <th class="text-center">Lượt Xem</th>
                        <th class="text-center">Nổi Bật</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $value)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $value->id }}</td>
                            <td>
                                <p>{{ $value->title }}</p>
                                <img width="100px" src="{{asset('storage/images/'. $value->image)}}">
                            </td>
                            <td>{{ $value->summary }}</td>
                            <td>{{ $value->TypeOfNews->Category->name }}</td>
                            <td>{{ $value->TypeOfNews->name }}</td>
                            <td>{{ $value->view }}</td>
                            <td>
                                @if($value->featured_news == 0)
                                    {{ 'Không' }}
                                @else
                                    {{ 'Có' }}
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/edit/{{ $value->id }}">Sửa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/delete/{{ $value->id }}" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xoa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {{ $news->links() }}
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection