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

    <div class="wrapper">
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

                @forelse ($category->products as $product)

                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img class="img-x-sm" src="{{ asset('storage/' . $product->images->first()->pic_path) }}"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <p style="width: 1.2rem; height: 1.2rem; background-color: {{ $product->color->hex }}; margin-right: 0.5rem; margin-bottom: 0.5rem;"></p>
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
                        <td>
                            <a href="{{route('admin.products.edit', [$category->id, $product->id])}}" class="green">Edit</a> | 
                            <form class="d-inline" method="POST" action="{{ route('admin.products.destroy', [$category->id, $product->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link red" onClick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>  

                @empty
                    <div class="alert alert-primary" role="alert">
                        <p class="mb-0">No products in this category yet.</p> 
                    </div>
                @endforelse
                    
            </tbody>
        </table>
     </div>
   
@endsection

@section('scripts')
    @parent
@endsection