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
                            <h1 class="m-0">Categories</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Success!</h5>
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    {{ $message }}
                </div>
            @endif



            <div class="conatiner-fluid mx-3">
                <div class="row d-flex justify-content-center mb-3">
                    <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary float-right">Create New
                        Category</a>
                </div>
                <div class="row">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 20%">Image</th>
                                <th style="width: 20%">Name</th>
                                <th style="width: 20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category['id'] }}.</td>
                                    <td><img src="{{ asset('storage/' . $category['image']) }}" alt="category"
                                            width="80px" height="80px"></td>
                                    <td>{{ $category['name'] }}</td>
                                    <td>
                                        <a class="btn btn-info mx-2"
                                            href="{{ url('/admin/categories/' . $category['id'] . '/edit') }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>

                                        <form style="display: inline" class="mx-2"
                                            action="{{ url('/admin/categories/' . $category['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete this category, Are you sure?')" class="btn btn-danger">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    @endsection
