<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection()

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'menus','key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success float-right m-2" href="{{route('menus.create')}}">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($menus as $menu)
                                <tr>
                                    <th scope="row">{{ $menu->id }}</th>
                                    <td>{{ $menu->name }}</td>
                                    <td>
                                        <a class="btn btn-default" href="{{route('menus.edit',['id'=>$menu->id])}}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('menus.delete',['id'=>$menu->id])}}">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $menus->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
