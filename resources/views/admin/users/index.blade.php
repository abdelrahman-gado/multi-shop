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
                            <h1 class="m-0">Users</h1>
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

            <div class="conatiner-fluid mx-3">

                <div class="row">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 10%">Name</th>
                                <th style="width: 20%">Email</th>
                                <th style="width: 15%">Created At</th>
                                <th style="width: 10%">Is Admin</th>
                                <th style="width: 20%">Change Admin Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['created_at'] }}</td>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="chk-box-{{ $user['id'] }}" disabled {{ ($user['is_admin']) ? "checked" : "" }}>
                                        <label for="chk-box-{{ $user['id'] }}" class="custom-control-label">{{ ($user['is_admin']) ? "admin" : "not admin" }}</label>
                                    </div>
                                </td>
                                <td>
                                  <form action="{{ url('/admin/users/' . $user['id'] ) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-primary" type="submit">Change Admin State</button>
                                  </form>
                                </td>
                            </tr>
 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
