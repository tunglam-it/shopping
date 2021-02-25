<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>List slider</title>
@endsection()
@section('js')
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
    <script src="{{asset('admins/slider/add/list.js')}}"></script>
@endsection()
@section('css')
    <link rel="stylesheet" href="{{asset('admins/slider/add/index.css')}}">
@endsection()
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Slider','key'=>'List'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success float-right m-2" href="{{route('slider.create')}}">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Description</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{$slider->id}}</th>
                                    <th scope="row">{{$slider->name}}</th>
                                    <th scope="row">{{$slider->description}}</th>
                                    <td><img class="image_slider_150_100" src="{{$slider->image_path}}"></td>
                                    <td>
                                        <a class="btn btn-default"
                                           href="{{route('slider.edit',['id'=>$slider->id])}}">Edit</a>
                                        <a class="btn btn-danger action_delete"
                                           data-url="{{route('slider.delete',['id'=>$slider->id])}}"
                                           href="">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $sliders->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

