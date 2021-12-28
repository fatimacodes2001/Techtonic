@extends('layouts.app')

@section('title', 'Cart')

@section('styles')
    @parent

    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')
    <h1 class="page-title text-center gap">Order #{{ $order->id  }}</h1>
    

    <div class="order-section d-flex flex-column align-items-center">
      <div class="order-details w-100 d-flex flex-column">
        <div class="table-responsive">
        <table class="order-items-table table table-borderless">
          <tbody class="d-flex flex-column">

          <tr class="d-flex">
            <td>
              <h2>Items</h2>
              
            </td>
          </tr>
          @foreach ($order->products as $product)


          <tr class="order-item d-flex" item="">
              <td class="item-img p-0">
                <img class="responsive-img" src="/img/phone.png" alt="item img">
              </td>
              <td class="item-info">
                <div class="d-flex flex-column">
                <p class="item-title fw-bold text-md m-0">{{$product->name}}</p>
                  
                  <div class="item-description">

                  @foreach ($product->specs as $spec)
                    <p class="d-block text-sm fw-light m-0">{{ $spec->spec }}</p>
                  @endforeach
                  </div>
                </div>
              </td>

              <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">
                  <div class="item-control-buttons d-flex align-items-center">
                     <?php 
                      $leave = FALSE;
                      if( $order->status === "Delivered" ){
                         $leave = TRUE;
                      }
   
                     ?>

                    @if ($leave)
                       <button><a href="{{ route('reviews.create', ['product' => $product->id] ) }}"> Leave Review </a></button>
                    @endif


                  </div>
                  <div class="item-price mt-auto">
                    <h4 class="m-0 d-block fw-bold text-end text-md">x{{ $product->pivot->quantity }} </h4>
                    <p class="m-0 d-block fw-light text-end text-md">{{ $product->price }} PKR</p>
                  </div>
              </td>
          
            <!-- End Order Item -->
          </tr>


          @endforeach


          

          <!-- Order Item -->
          

          <tr class="d-flex">
            <td>
              <h2>Shipping Details</h2>
            </td>
          </tr>


          <tr class="order-item d-flex" item="">
              
              <td class="item-info">
                <div class="d-flex flex-column">
                  <p class="item-title text-md m-0"> <strong>Country -</strong> {{ $address->country}} </p>
                  <p class="item-title text-md m-0"> <strong>City - </strong> {{ $address->city}} </p>
                  <p class="item-title text-md m-0"> <strong>Street -</strong> {{ $address->street_address}} </p>
                  <p class="item-title text-md m-0"> <strong>Exquisite Remarks -</strong> {{ $order->remarks}}  </p>

                  
                </div>
              </td>
              
          
            <!-- End Order Item -->
          </tr>

          <tr class="d-flex">
            <td>
              <h2>Billing</h2>
            </td>
          </tr>

          <tr class="order-item d-flex">

                    <td class="item-info">
                      <div class="d-flex flex-column">
                        <p class="item-title fw-bold text-md m-0">Grand Total</p>

                      </div>
                    </td>
                    <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">
                      <div class="item-price mt-auto">
                        <p class="m-0 d-block fw-light text-end text-md">{{ $order->order_total }}  PKR</p>
                      </div>
                    </td>
          </tr>

          <tr class="order-item d-flex">

                    <td class="item-info">
                      <div class="d-flex flex-column">
                        <p class="item-title fw-bold text-md m-0">Discounts</p>

                      </div>
                    </td>
                    <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">
                      <div class="item-price mt-auto">
                        <p class="m-0 d-block fw-light text-end text-md">0 PKR</p>
                      </div>
                    </td>
          </tr>

          <tr class="d-flex">
            <td>
              <h2>Payment</h2>
            </td>
          </tr>

          <tr class="order-item d-flex">

                    <td class="item-info">
                      <div class="d-flex flex-column">
                      @if ($order->mode === "cod")
                            <p class="item-title fw-bold text-md m-0">Cash On Delivery</p>
                      @else 
                        <p class="item-title fw-bold text-md m-0">Credit/Debit Card</p>
                      @endif

                      </div>
                    </td>
                    
          </tr>





  
          </tbody>
        </table>
        </div>
      </div>
      
      
    </div>
    <!-- End Orders section -->
@endsection

@section('scripts')
    @parent


    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    

    
    
@endsection