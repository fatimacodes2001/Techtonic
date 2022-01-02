@extends('layouts.admin')

@section('title', 'Admin Panel')

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">Admin Panel</h1>

    <div class="row">
        <div class="col-md-1 col-lg-2"></div>

        <div class="col-12 col-md-5 col-lg-4">
            <div class="card mx-auto">
                <img src="/img/users.jpg" class="card-img-top" alt="users">
                <div class="card-body">
                    <p class="card-text"><span>{{ $count['users'] }}</span> Users</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-5 col-lg-4">
            <div class="card mx-auto">
                <img src="/img/orders.jpg" class="card-img-top" alt="orders">
                <div class="card-body">
                    <p class="card-text"><span>{{ $count['orders'] }}</span> Orders</p>
                </div>
            </div>
        </div>

        <div class="col-md-1 col-lg-2"></div>

        <div class="col-md-1 col-lg-2"></div>

        <div class="col-12 col-md-5 col-lg-4">
            <div class="card mx-auto">
                <img src="/img/products.jpg" class="card-img-top" alt="products">
                <div class="card-body">
                    <p class="card-text"><span>{{ $count['products'] }}</span> Products</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-5 col-lg-4">
            <div class="card mx-auto">
                <img src="/img/categories.jpg" class="card-img-top" alt="categories">
                <div class="card-body">
                    <p class="card-text"><span>{{ $count['categories'] }}</span> Categories</p>
                </div>
            </div>
        </div>

        <div class="col-md-1 col-lg-2"></div>
    </div>
   
@endsection

@section('scripts')
    @parent
@endsection