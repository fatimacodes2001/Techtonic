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
                <th>Products</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($orders as $order)

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
                     <td>
                        <ul>
                            @foreach ($order->products as $product)

                                <li>{{ $product->name . ' (' . $product->pivot->quantity . ')' }}</li>

                            @endforeach
                        </ul>
                    </td>
                </tr>  

            @endforeach
                
        </tbody>
    
    </table>
   
@endsection

@section('scripts')
    @parent

    <script>

// $(function () {
//         let _token = $('meta[name="csrf-token"]').attr('content');
//         $('.status').on("change", function() {
//             var orderId = $(this).closest('tr').find('td').first().text();
//             $.ajax({
//                 url: `/admin/orders/${orderId}`,
//                 type: "POST",
//                 data: {
//                     _token: _token,
//                     status: this.value 
//                 } 
//             })
//         });
//         });

         function sendAjax(order, status){


        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                  url: "/admin/orders/"+order,
                  type:"POST",
                  data:{
                    _token: _token,
                    status: status
                  },
                   success: function (data) {
    },
    error: function (data) {
     console.log('Error:', data);
    },
                  dataType: "json"
                  
              });

              

      }

      $('.status').on("change", function() {
            var orderId = $(this).closest('tr').find('td').first().text();
            sendAjax(orderId, this.value)
        });
    </script>
@endsection