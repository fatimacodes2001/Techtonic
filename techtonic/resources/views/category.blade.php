@extends('layouts.app')

@section('title', $category->name)

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
            <h1 class="page-title text-center">{{ $category->name }}</h1>
            <p class="page-subtitle text-center">{{ $category->description }}</p>
        </div>

        <div class="category-row">
            <div class="row">

                @foreach ($category->products as $product)

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
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
@endsection