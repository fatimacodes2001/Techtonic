@extends('layouts.admin')

@section('title', $title)

@section('styles')
    @parent

@endsection

@section('content')
    <h1 class="page-title text-center gap">{{ $title }}</h1>

    <div class="wrapper">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placed By</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Total (PKR)</th>
                    <th>Payment Method</th>
                    <th>Shipping Address</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Postal Code</th>
                    <th>Products</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($orders as $order)

                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_email }}</td>
                        <td>{{ $order->date }}</td>
                        <td>
                            @php
                                $statusValues = ['Placed', 'Processing', 'Shipped', 'Delivered'];
                            @endphp

                            <select class="form-select form-select-sm status" name="status">

                                @foreach ($statusValues as $status)
                                    @if ($order->status === $status)
                                        <option value="{{ $status }}" selected>{{ $status }}</option>
                                    @else
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </td>
                        <td>{{ $order->remarks }}</td>
                        <td>{{ $order->order_total }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->address->street_address }}</td>
                        <td>{{ $order->address->city }}</td>
                        <td>{{ $order->address->country }}</td>
                        <td>{{ $order->address->postal_code }}</td>
                        <td><a href="{{route('admin.orders.show', $order->id)}}">View Products</a></td>
                        <!-- <td>
                            <ul>
                                @foreach ($order->products as $product)

                                    <li>{{ $product->name . ' (' . $product->pivot->quantity . ')' }}</li>

                                @endforeach
                            </ul>
                        </td> -->
                    </tr>  

                @empty
                    <div class="alert alert-primary" role="alert">
                        <p class="mb-0">No orders have been placed yet.</p> 
                    </div>
                @endforelse
                    
            </tbody>
        </table>
    </div>
   
@endsection

@section('scripts')
    @parent

    <script>

        $(function () {
            let _token = $('meta[name="csrf-token"]').attr('content');
            $('.status').on("change", function() {
                var orderId = $(this).closest('tr').find('td').first().text();
                $.ajax({
                    url: `/admin/orders/${orderId}`,
                    type: "POST",
                    data: {
                        _token: _token,
                        status: this.value 
                    } 
                })
            });
        });

    </script>
@endsection