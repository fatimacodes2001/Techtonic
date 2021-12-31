@extends('layouts.admin')

@section('title', $category->name)

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center pb-3">{{ $category->name }}</h1>
    <div class="text-center gap">
        <a href="{{route('admin.products.create', $category->id)}}">Add New Product</a>
    </div>

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
                    <td>
                        <p style="width: 1.25rem; height: 1.25rem; background-color: {{ $product->color->hex }}; margin-right: 0.5rem;"></p>
                        {{ $product->color->name  }}
                    </td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <ul>
                            @foreach ($product->specs as $specification)

                                <li>{{ $specification->spec }}</li>

                            @endforeach
                        </ul>
                    </td>
                    <td><a href="">Edit</a> | <a href="" onClick="return confirm('Are you sure you want to delete?')">Delete</a</td>
                </tr>  

            @endforeach
                
        </tbody>
    
    </table>
   
@endsection

@section('scripts')
    @parent
@endsection