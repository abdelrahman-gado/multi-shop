@extends('layouts.main')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/' . $product['image']) }}" alt="Image">
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $product['name'] }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">({{ $product['rating_count'] }} Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">${{ $product->getPriceAfterDiscount() }}</h3>
                    <p class="mb-4">{{ $product['description'] }}</p>
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Sizes:</strong>
                        <form>
                            @foreach ($sizes as $size)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-{{ $size['id'] }}"
                                        name="size" {{ $size['id'] === $product['size_id'] ? 'checked' : '' }} disabled>
                                    <label class="custom-control-label"
                                        for="size-{{ $size['id'] }}">{{ $size['name'] }}</label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                    <div class="d-flex mb-4">
                        <strong class="text-dark mr-3">Colors:</strong>
                        <form>
                            @foreach ($colors as $color)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-{{ $color['id'] }}"
                                        name="color" {{ $color['id'] == $product['color_id'] ? 'checked' : '' }}
                                        disabled>
                                    <label class="custom-control-label"
                                        for="color-{{ $color['id'] }}">{{ $color['name'] }}</label>
                                </div>
                            @endforeach
                        </form>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1"
                                id="quantity">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3" onclick="addProductToCart({{ $product['id'] }})"><i
                                class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews
                            ({{ $product['rating_count'] }})</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>{{ $product['description'] }}</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam
                                invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod
                                consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam.
                                Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos
                                dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod
                                nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt
                                tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                        </li>
                                        <li class="list-group-item px-0">
                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            @if (auth()->user())
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-4">{{ $product['rating_count'] }} review for
                                            {{ $product['name'] }}</h4>
                                        <div class="media mb-4">
                                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                                style="width: 45px;">
                                            <div class="media-body">
                                                <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                                <div class="text-primary mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam
                                                    ipsum
                                                    et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mb-4">Leave a review</h4>
                                        <small>Your email address will not be published. Required fields are marked
                                            *</small>
                                        <form action="{{ url('/detail?id=' . $product['id']) }}" method="POST">
                                            @csrf
                                            <div class="my-3 form-group">
                                                <label class="mb-0 mr-2">Your Rating * :</label>
                                                <input type="number" class="form-control flex-grow-1" id="rating" name="rating"
                                                    min="0" max="5" step="0.5" onchange="showRating()" value="0" required>
                                                <div class="text-primary" id="div-rating">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="message">Your Review *</label>
                                                <textarea id="message" cols="30" rows="5" class="form-control" name="review" required>{{ old('review') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Your Name *</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Your Email *</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" value="Leave Your Review"
                                                    class="btn btn-primary px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-6">
                                        <p>Please login to be able to show reviews and to leave a review</p>
                                        <a class="btn btn-primary px-3" href="{{ url('/login') }}">Login</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May
                Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($products as $carouselProduct)
                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ 'storage/' . $carouselProduct['image'] }}"
                                    alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square"
                                        onclick="addProductToCart({{ $carouselProduct['id'] }})"><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square"
                                        onclick="addProductToLikedList({{ $carouselProduct['id'] }})"><i
                                            class="far fa-heart"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate"
                                    href="{{ url('/detail?id=' . $carouselProduct['id']) }}">{{ $carouselProduct['name'] }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>${{ $carouselProduct->getPriceAfterDiscount() }}</h5>
                                    <h6 class="text-muted ml-2"><del>${{ $carouselProduct['price'] }}</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>({{ $carouselProduct['rating_count'] }})</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection

@section('scripts')
    <script>
        function addProductToCart(id) {
            const quantity = $('#quantity').val()
            $.ajax({
                url: "{{ url('/add-product-to-cart') }}",
                data: {
                    id: id,
                    quantity: quantity
                },
                success: (data) => {
                    $("#cartspan1").html(data['count']);
                    $("#cartspan2").html(data['count']);
                }
            });
        }

        function addProductToLikedList(id) {
            $.ajax({
                url: "{{ url('/add-product-to-likedlist') }}",
                data: {
                    id: id
                },
                success: (data) => {
                    $("#heartspan1").html(data['count']);
                    $("#heartspan2").html(data['count']);
                }
            });
        }

        function showRating() {
            const ratingValue = parseFloat($("#rating").val());
            const divRating = $("#div-rating");
            divRating.html('');
            for (let i of [1, 2, 3, 4, 5]) {
                if (ratingValue >= i) {
                    divRating.append('<i class="fas fa-star"></i>');
                } else if (Math.abs(ratingValue - i) == 0.5) {
                    divRating.append('<i class="fas fa-star-half-alt"></i>');
                } else {
                    divRating.append('<i class="far fa-star"></i>');
                }
            }

        }
    </script>
@endsection
