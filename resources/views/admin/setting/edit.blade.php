<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Edit Setting</title>
@endsection()

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Setting','key'=>'Edit'])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('setting.update',['id'=>$setting->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config Key</label>
                                <input type="text" name="config_key"
                                       class="form-control @error('config_key') is-invalid @enderror"
                                       placeholder="Nhập config key"
                                       value="{{$setting->config_key}}">
                            </div>
                            @error('config_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @if(request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <input type="text" name="config_value"
                                           class="form-control @error('config_value') is-invalid @enderror"
                                           placeholder="Nhập config value"
                                           value="{{$setting->config_value}}">
                                </div>
                                @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @elseif(request()->type === 'Textarea')
                                <div class="form-group">
                                    <label>Config Value</label>
                                    <textarea name="config_value"
                                              class="form-control @error('config_value') is-invalid @enderror"
                                              rows="5">{{$setting->config_value}}</textarea>
                                </div>
                                @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endif
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

