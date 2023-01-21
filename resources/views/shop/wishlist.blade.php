@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <h1 class="col-lg-3 d-none d-lg-block">
                Wish List
            </h1>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th colspan="2">Remove / Add to Cart</th>
                    </tr>
                </thead>
                <tbody class="align-middle" id="products">
                    @foreach ($products as $product)
                        <tr id="{{ $product['id'] }}">
                            <td class="align-middle">{{ $product['name'] }}</td>
                            <td class="align-middle"><img width="50px" height="50px"
                                    src="{{ asset('storage/' . $product['image']) }}" alt=""></td>
                            <td class="align-middle">{{ $product->getPriceAfterDiscount() }}</td>
                            <td class="align-middle">
                                <button class="btn btn-sm btn-danger mx-1" type="button"
                                    onclick="removeProductFromWishList({{ $product['id'] }})"><i
                                        class="fas fa-minus"></i></button>
                                <button class="btn btn-sm btn-success mx-1" type="button"
                                    onclick="addProductToCart({{ $product['id'] }})"><i class="fas fa-plus"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function addProductToCart(id) {
            $.ajax({
                url: "{{ url('/add-product-to-cart') }}",
                data: {
                    id: id
                },
                success: (data) => {
                    $("#cartspan1").html(data['count']);
                    $("#cartspan2").html(data['count']);
                    location.href = data['cartUrl'];
                }
            });
        }

        function removeProductFromWishList(id) {
            $.ajax({
                url: "{{ url('/remove-product-from-wishlist') }}",
                data: {
                    id: id
                },
                success: (data) => {
                    $("#heartspan1").html(data['count']);
                    $("#heartspan2").html(data['count']);
                    $("#"+data['id']).remove();
                }
            });
        }
    </script>
@endsection
