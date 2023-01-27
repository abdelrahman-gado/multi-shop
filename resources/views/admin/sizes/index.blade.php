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
                            <h1 class="m-0">Sizes</h1>
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
                    <form action="{{ url('/admin/sizes') }}" method="POST">
                        @csrf
                        <label for="name">Size Name: </label>
                        <input type="text" id="name" name="name" placeholder="Enter Size Name" required>
                        <button type="submit" class="btn btn-primary btn">Add</button>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
                <div class="row">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 20%">#</th>
                                <th style="width: 20%">Name</th>
                                <th style="width: 30%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $size)
                                <tr>
                                    <td>{{ $size['id'] }}</td>
                                    <td>{{ $size['name'] }}</td>
                                    <td>
                                        <form style="display: inline" class="mx-2"
                                            action="{{ url('/admin/sizes/' . $size['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Delete this size, Are you sure?')"
                                                class="btn btn-danger">
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
                    {!! $sizes->links() !!}
                </div>
            </div>

        </div>
    @endsection
