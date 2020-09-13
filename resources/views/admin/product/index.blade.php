<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection()

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'product','key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success float-right m-2" href="{{route('product.create')}}">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            {{--@foreach($categories as $category)--}}
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Iphone 4</td>
                                    <td>2.400.000</td>
                                    <td><img src="" alt=""></td>
                                    <td>Điện thoại</td>
                                    <td>
                                        <a class="btn btn-default" href="">Edit</a>
                                        <a class="btn btn-danger" href="">Delete</a>
                                    </td>

                                </tr>
                            {{--@endforeach--}}
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{--{{ $categories->links() }}--}}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

