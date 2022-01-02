@extends('layouts.admin')

@section('title', 'Order#' . $order->id)

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">{{ 'Order#' . $order->id }}</h1>

    <div class="wrapper">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Specs</th>
                    <th>Price (PKR)</th>
                    <th>Quantity</th>
                    <th>Product Total</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($order->products as $product)

                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img class="img-x-sm" src="{{ asset('storage/' . $product->images->first()->pic_path) }}"></td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <p style="width: 1.2rem; height: 1.2rem; background-color: {{ $product->color->hex }}; margin-right: 0.5rem; margin-bottom: 0.5rem;"></p>
                            {{ $product->color->name  }}
                        </td>
                        <td>
                            <ul>
                                @foreach ($product->specs as $specification)

                                    <li>{{ $specification->spec }}</li>

                                @endforeach
                            </ul>
                        </td>  
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->pivot->product_total }}</td>
                    </tr>  

                @empty
                    <div class="alert alert-primary" role="alert">
                        <p class="mb-0">No products in this order.</p> 
                    </div>
                @endforelse

                <tr>
                <th colspan="7">Order Total (PKR)</th>
                <td colspan="1">{{ $order->order_total }}</td>
            </tr>
                    
            </tbody>
        </table>
        <!-- <table>
            <tr>
                <th>Order Total (PKR)</th>
                <td>{{ $order->order_total }}</td>
            </tr>
        </table> -->
     </div>
   
@endsection

@section('scripts')
    @parent
@endsection