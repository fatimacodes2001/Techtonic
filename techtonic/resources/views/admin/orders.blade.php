@extends('layouts.admin')

@section('title', 'Orders')

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">Orders</h1>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Placed By</th>
                <th>Date</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Total</th>
                <th>Payment Method</th>
                <th>Shipping Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Postal Code</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($orders as $order)

                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>{{ $order->date }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->remarks }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->address->street_address }}</td>
                    <td>{{ $order->address->city }}</td>
                    <td>{{ $order->address->country }}</td>
                    <td>{{ $order->address->postal_code }}</td>
                </tr>  

            @endforeach
                
        </tbody>
    
    </table>
   
@endsection

@section('scripts')
    @parent
@endsection