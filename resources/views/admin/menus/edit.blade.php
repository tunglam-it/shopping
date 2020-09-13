<!-- Stored in resources/views/child.blade.php -->
@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection()

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'menu','key'=>'Edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menus.update',['id'=>$menuFollowIdEdit->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên menu</label>
                                <input type="text" name="name"
                                       class="form-control"
                                       placeholder="Nhập tên menu"
                                        value="{{$menuFollowIdEdit->name}}">
                            </div>
                            <div class="form-group">
                                <label>Chọn menu cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
