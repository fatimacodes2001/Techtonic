@extends('layouts.app')

@section('title', $product->name)

@section('styles')
    @parent

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
      integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
      integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/home-categories.css">
    <link rel="stylesheet" href="/css/product-desc.css">
    <link rel="stylesheet" href="/css/cart.css">

    <style>
        .color-card {
            background-image: linear-gradient(to bottom right, {{ $product->color->hex }}, #000000);
            color: #fcfcfc;
        }
    </style>
@endsection

@section('content')
    <div class="gap">
        <h1 class="page-title text-center gap">{{ $product->name }}</h1>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

            @foreach ($product->images as $image)

                <div @class(['carousel-item', 'active' => $loop->first])>
                    <div class="image-sec">
                        <img src="{{ $image->pic_path }}" alt="{{ $product->name . '-' . $loop->index + 1 }}" class="main-img">
                    </div>
                </div>

            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

    @php
        $outOfStock = ($product->stock_quantity) === 0 ? true : false;
    @endphp

    <div class="cart-button">
        <button @class(['btn', 'btn-dark', 'checkout-button', 'text-center', 'text-sm', 'disabled' => $outOfStock])>
            Add to Cart
            <img src="/img/cart-light.svg" alt="checkout">
        </button>
    </div>

    @if($outOfStock)
        <h5 class="out-of-stock">Out of Stock</h5>
    @endif

    <div class="desc-card-price">
        <div class="desc-card-body">
            <h5 class="desc-card-title">Price</h5>

            <p class="desc-card-text-price">{{ $product->price }} PKR
            </p>

        </div>


        <div class="desc-card-body">
            <h5 class="desc-card-title">Description</h5>
            <p class="desc-card-text">{{ $product->description }}
            </p>
        </div>
        <div class="desc-card-body">
            <h5 class="desc-card-title">Specifications</h5>
            <ul class="desc-card-text">
                @foreach ($product->specs as $specification)

                    <p>{{ $specification->spec }}</p>

                @endforeach
            </ul>
            </p>
        </div>
        <div class="desc-card-body">
            <h5 class="desc-card-title">Color</h5>
            <ul class="color-card-text">
                <p class="color-card">{{ $product->color->name }}</p>
                {{-- <p id="color-card-blue">Midnight Blue</p>
                <p id="color-card-green">Winston Green</p>
                <p id="color-card-gold">Caviar Gold</p>
                <p id="color-card-black">Apex Black</p> --}}
            </ul>
        </div>
    </div>

    <div id="top-categories" class="category-row">
        <h1 class="category-title text-center mt-5">Appraisals</h1>
        <p class="category-subtitle text-center">Beyond satisfaction</p>
        <table class="order-items-table table table-borderless">
            <tbody class="d-flex flex-column">

                <tr class="order-item d-flex">
                    <td class="item-img p-0">
                        <img class="responsive-img" src="https://images.unsplash.com/photo-1456444029056-7dfaeeb83a19?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=776&q=80" alt="item img">
                    </td>
                    <td class="item-info">
                        <div class="d-flex flex-column">
                            <p class="item-title fw-bold text-md m-0">Jeff Bezos</p>
                            <div class="item-description">
                                <p class="d-block text-sm fw-light m-0">You've saved our business! It's exactly what I've been looking for. Absolutely wonderful! I could probably go into sales for you</p>
                            </div>
                        </div>
                    </td>
                    <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">

                        <div class="number-control-buttons d-flex align-items-center">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                        </div>
                    </td>
                </tr>

                <tr class="order-item d-flex">
                    <td class="item-img p-0">
                        <img class="responsive-img" src="https://images.unsplash.com/photo-1616645004064-aebe96923cbb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80" alt="item img">
                    </td>
                    <td class="item-info">
                        <div class="d-flex flex-column">
                            <p class="item-title fw-bold text-md m-0">Elon Musk</p>
                            <div class="item-description">
                                <p class="d-block text-sm fw-light m-0">Just what I was looking for.</p>
                            </div>
                        </div>
                    </td>
                    <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">

                        <div class="number-control-buttons d-flex align-items-center">
                            <img src="/img/star-empty.svg">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                        </div>
                    </td>
                </tr>

                <tr class="order-item d-flex">
                    <td class="item-img p-0">
                        <img class="responsive-img" src="https://images.unsplash.com/photo-1551299335-7337a578ef8f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=930&q=80" alt="item img">
                    </td>
                    <td class="item-info">
                        <div class="d-flex flex-column">
                            <p class="item-title fw-bold text-md m-0">Mr.Beast</p>
                            <div class="item-description">
                                <p class="d-block text-sm fw-light m-0">Iphone 12 pro max saved my business. Iphone 12 pro max saved my business. Iphone 12 pro max is awesome! No matter where you go, iphone 12 pro max is the coolest, most happening thing around!</p>
                            </div>
                        </div>
                    </td>
                    <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">

                        <div class="number-control-buttons d-flex align-items-center">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                            <img src="/img/star-fill.svg">
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <div id="top-categories" class="category-row">
        <h1 class="category-title text-center">Similar Merchandise</h1>
        <p class="category-subtitle text-center">Furnishing your every Desire</p>

        <div class="row-scroll">

            @foreach ($similarMerch as $merch)

                 <div class="card category-card text-white">
                    <img src="{{ $merch->images->first()->pic_path }}" class="card-img" alt="{{ $merch->name }}">
                    <div class="card-img-overlay">
                        <a href="{{route('products.show', $merch->id)}}">
                            <h5 class="category-title">{{ $merch->name }}</h5>
                        </a>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
      integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/script.js"></script>
@endsection