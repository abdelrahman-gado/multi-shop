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
                            <h1 class="m-0">Orders</h1>
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
                                <th style="width: 5%">#</th>
                                <th style="width: 15%">Created At</th>
                                <th style="width: 15%">Email</th>
                                <th style="width: 10%">Full Name</th>
                                <th style="width: 5%">SubTotal</th>
                                <th style="width: 5%">Shipping</th>
                                <th style="width: 5%">Total</th>
                                <th style="width: 40%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($orders as $order)
                            <tr>
                              <td>{{ $order['id'] }}</td>
                              <td>{{ $order['created_at'] }}</td>
                              <td>{{ $order['email'] }}</td>
                              <td>{{ $order['firstname'] . ' ' . $order['lastname'] }}</td>
                              <td>${{ $order['subtotal'] }}</td>
                              <td>${{ $order['shipping'] }}</td>
                              <td>${{ $order['total_price'] }}</td>
                              <td>
                                        <a class="btn btn-primary mx-2" href="{{ url('/admin/orders/' . $order['id']) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>

                                        <a class="btn btn-info mx-2"
                                            href="{{ url('/admin/orders/' . $order['id'] . '/edit') }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>

                                        <form style="display: inline" class="mx-2"
                                            action="{{ url('/admin/orders/' . $order['id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Delete this product, Are you sure?')"
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
                    {!! $orders->links() !!}
                </div>
            </div>
        </div>
@endsection