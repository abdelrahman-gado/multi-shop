@extends('layouts.admin')
@section('content')
    <div class="content mx-2">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Create New Category</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <form class="card-body" action="{{ url('/admin/categories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Enter Category Name" value="{{ old('name') }}">
                </div>
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="image">Category Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose image</label>
                        </div>
                    </div>
                </div>
                @error('image')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <button type="submit" class="btn btn-primary btn-block">Create New Category</button>
                    <a href="{{ url('/admin/categories') }}" class="btn btn-default btn-block">Cancel</a>
                </div>
            </form>
        </div>
    @endsection
