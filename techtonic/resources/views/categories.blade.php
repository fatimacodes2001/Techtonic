@extends('layouts.app')

@section('title', 'Categories')

@section('styles')
    @parent

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/categories.css">
@endsection

@section('content')
    <div id="categories">
        <div class="gap">
            <h1 class="page-title text-center">Categories</h1>
            <p class="page-subtitle text-center">Furnishing your every Desire</p>
        </div>

        @foreach ($categories as $category)            

            <div class="category-row">
                <h1 class="category-title text-center">{{ $category->name }}</h1>
                <p class="category-subtitle text-center">{{ $category->description }}</p>
                <p class="browse text-end"><a href="{{route('categories.show', $category->id)}}">Browse our Collection <i class="bi bi-chevron-right"></i></a></p>

                <div class="row">

                    @foreach ($category->productsThree as $product)

                        <div class="col-6 col-md-4">
                            <div class="card text-white">
                                <img src="{{ $product->images->first()->pic_path }}" class="card-img" alt="{{ $product->name }}">
                                <div class="card-img-overlay">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <a href="{{route('products.show', $product->id)}}">Explore <i class="bi bi-chevron-down"></i></a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

                <p class="browse-md text-center"><a href="{{route('categories.show', $category->id)}}">Browse our Collection <i
                            class="bi bi-chevron-right"></i></a>
                </p>
            </div>       

        @endforeach

    </div>
@endsection

@section('scripts')
    @parent

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
@endsection