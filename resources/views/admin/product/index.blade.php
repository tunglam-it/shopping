<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection()

@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/list.css')}}">
@endsection()

@section('js')
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
    <script src="{{asset('admins/product/index/list.js')}}"></script>
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
                            @foreach($products as $productItem)
                                <tr>
                                    <th scope="row">{{$productItem->id}}</th>
                                    <td>{{$productItem->name}}</td>
                                    <td>{{number_format($productItem->price)}}</td>
                                    <td><img class="imgProduct150_100" src="{{$productItem->feature_image}}" alt=""></td>
                                    <td>{{optional($productItem->category)->name}}</td>
                                    <td>
                                        <a class="btn btn-default" href="{{route('product.edit',['id'=>$productItem->id])}}">Edit</a>
                                        <a class="btn btn-danger action_delete"
                                           data-url="{{route('product.delete',['id'=>$productItem->id])}}"
                                           href="">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

