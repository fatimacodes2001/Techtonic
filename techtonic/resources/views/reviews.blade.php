@extends('layouts.app')

@section('title', 'Reviews - ' . $product['name'])

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
    <link rel="stylesheet" href="/css/product-desc.css">
    <link rel="stylesheet" href="/css/cart.css">
@endsection

@section('content')
    <div class="gap">
        <h1 class="page-title text-center gap">{{ $product['name'] }}</h1>
    </div>

    <div id="top-categories" class="category-row">
        <h1 class="category-title text-center mt-5">Appraisals</h1>
        <p class="category-subtitle text-center">Beyond satisfaction</p>
        <table class="order-items-table table table-borderless">
            <tbody class="d-flex flex-column">

                @foreach ($reviews as $review)

                    <tr class="order-item d-flex">
                        <td class="item-img p-0">
                            <img class="responsive-img" src="{{ $review->user->profile_pic }}" alt="{{ $review->user->first_name }}">
                        </td>
                        <td class="item-info">
                            <div class="d-flex flex-column">
                                <p class="item-title fw-bold text-md m-0 mb-2">{{ $review->user->first_name . ' ' . $review->user->last_name }}</p>
                                <div class="item-description px-0">
                                    <p class="d-block text-sm fw-light m-0">{{ $review->text }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">

                            <div class="number-control-buttons d-flex align-items-center">

                                @for ($i = 0; $i < $review->rating; $i++)
                                    <img src="/img/star-fill.svg">
                                @endfor

                                @for ($i = 0; $i < (5-$review->rating); $i++)
                                    <img src="/img/star-empty.svg">
                                @endfor

                            </div>
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>
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