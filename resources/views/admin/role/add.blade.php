<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add Role</title>
@endsection()
@section('js')
    <script src="{{asset('admins/role/add/list.js')}}"></script>
@endsection()
@section('css')
    <link rel="stylesheet" href="{{asset('admins/role/add/index.css')}}">
@endsection()
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Role','key'=>'Add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('role.store')}}" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label>Tên role</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Nhập tên role"
                                       value="{{old('name')}}">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="display_name" rows="4"
                                          class="form-control @error('display_name') is-invalid @enderror"></textarea>
                            </div>
                            @error('display_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>
                                        <input class="checkAll" type="checkbox">
                                        Check All
                                    </label>
                                </div>
                                @foreach($permissionParent as $permissionParentItem)
                                    <div class="card border-dark mb-3 col-md-12">
                                        <div class="card-header">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox_parent">
                                            </label>
                                            Module {{$permissionParentItem->name}}
                                        </div>
                                        <div class="row">
                                            @foreach($permissionParentItem->permissionChildren as $permissionChildrenItem)
                                                <div class="card-body text-dark col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" name="permission_id[]"
                                                                   class="checkbox_children"
                                                                   value="{{$permissionChildrenItem->id}}">
                                                        </label>
                                                        {{$permissionChildrenItem->name}}
                                                    </h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

