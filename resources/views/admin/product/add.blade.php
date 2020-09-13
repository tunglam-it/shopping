<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Add Product</title>
@endsection()

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection()

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'product','key'=>'Add'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name"
                                       class="form-control" placeholder="Nhập tên sản phẩm">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" name="price"
                                       class="form-control" placeholder="Nhập giá sản phẩm">
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file" name="feature_image"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple name="image_path[]"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control select_init" name="parent_id">
                                    <option value="0">Chọn danh mục</option>
                                    {!! $htmlOption !!};
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nhập tag cho sản phẩm</label>
                                <select class="form-control tags_select_choose" multiple="multiple">

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(function () {
            $(".tags_select_choose").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
            $(".select_init").select2({
                placeholder: "Chọn danh mục",
                allowClear: true
            });
        })
    </script>
@endsection()

