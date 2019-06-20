@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>> {{$category->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/category/edit/{{$category->id}}" method="post">
                    @csrf
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        <strong>{{$err}}</strong><br/>
                        @endforeach
                    </div>
                    @endif
                    <div class="form-group">
                        <p>
                            <label>Tên Thể Loại</label>
                            <input class="form-control input-width" name="name" value="{{$category->name}}"  />
                        </p>
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
<!-- /#page-wrapper -->
@endsection
