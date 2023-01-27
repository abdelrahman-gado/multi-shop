<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
    <div class="product-item bg-light mb-4">
        <div class="product-img position-relative overflow-hidden">
            <img class="img-fluid w-100" src="{{ asset('storage/' . $product['image']) }}" alt="">
            <div class="product-action">
                <a class="btn btn-outline-dark btn-square" onclick="addProductToCart({{ $product['id'] }})"><i
                        class="fa fa-shopping-cart"></i></a>
                <a class="btn btn-outline-dark btn-square" onclick="addProductToLikedList({{ $product['id'] }})"><i
                        class="far fa-heart"></i></a>
            </div>
        </div>
        <div class="text-center py-4">
            <a class="h6 text-decoration-none text-truncate"
                href="{{ url('/detail?id=' . $product['id']) }}">{{ $product['name'] }}</a>
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5>${{ $product->getPriceAfterDiscount() }}</h5>
                <h6 class="text-muted ml-2"><del>${{ $product['price'] }}</del></h6>
            </div>
            @include('partials.stars', [
                'rating' => $product['rating'],
                'rating_count' => $product['rating_count'],
            ])
        </div>
    </div>
</div>
