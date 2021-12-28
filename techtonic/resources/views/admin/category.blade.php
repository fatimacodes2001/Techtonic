@extends('layouts.admin')

@section('title', 'Categories')

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">{{ $category->title }}</h1>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pic</th>
                <th>Name</th>
                <th>Price (PKR)</th>
                <th>Color</th>
                <th>Stock Quantity</th>
                <th>Specs</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($category->products as $product)

                <tr>
                    <td>{{ $product->id }}</td>
                    <td><img width='65px' height='70px' src="{{ $product->images->first()->pic_path }}"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td style="font-weight:500; color: {{ $product->color->hex }}">{{ $product->color->name  }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <ul>
                            @foreach ($product->specs as $specification)

                                <li>{{ $specification->spec }}</li>

                            @endforeach
                        </ul>
                    </td>
                    <td><a href="">Edit</a> | <a href="">Delete</a</td>
                </tr>  

            @endforeach
                
        </tbody>
    
    </table>
   
@endsection

@section('scripts')
    @parent
@endsection