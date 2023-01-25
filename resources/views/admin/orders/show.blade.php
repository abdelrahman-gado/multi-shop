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
                            <h1 class="m-0">Order #{{ $order['id'] }}</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <div class="conatiner-fluid mx-5">
                <div class="row">
                    <ul class="col-6">
                        <li>order id: {{ $order['id'] }}</li>
                        <li>Datetime of creation: {{ $order['created_at'] }}</li>
                        <li>customer email: {{ $order['email'] }}</li>
                        <li>customer mobile number: {{ $order['mobile_no'] }}</li>
                        <li>customer address 1: {{ $order['address1'] }}</li>
                        <li>customer address 2: {{ $order['address2'] ?? 'Not Exist' }}</li>
                    </ul>
                    <ul class="col-6">
                        <li>customer country: {{ $order['country'] }}</li>
                        <li>customer city: {{ $order['city'] }}</li>
                        <li>customer state: {{ $order['state'] }}</li>
                        <li>order sub-total price: ${{ $order['subtotal'] }}</li>
                        <li>order shipping price: ${{ $order['shipping'] }}</li>
                        <li>order total price: ${{ $order['total_price'] }}</li>
                    </ul>
                </div>
                <div class="row mt-4">
                  <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 10%">Product ID</th>
                                <th style="width: 10%">Product name</th>
                                <th style="width: 10%">Quantity</th>
                                <th style="width: 5%">Price</th>
                                <th style="width: 10%">Category</th>
                                <th style="width: 5%">Size</th>
                                <th style="width: 10%">Color</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($orderDetails as $detail)
                            <tr>
                              <td>{{$detail->id}}</td>
                              <td>{{ $detail->product->id }}</td>
                              <td>{{ $detail->product->name }}</td>
                              <td>{{ $detail->quantity }}</td>
                              <td>${{ $detail->price }}</td>
                              <td>{{ $detail->product->category->name }}</td>
                              <td>{{ $detail->product->size->name }}</td>
                              <td>{{ $detail->product->color->name }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
    @endsection
