@extends('layouts.app')

@section('title', 'Checkout')

@section('styles')
    @parent

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/cart.css">
@endsection

@section('content')
    <h1 class="page-title text-center gap">Checkout</h1>

    <div class="order-section d-flex flex-column align-items-center">
      <div class="order-details w-100 d-flex flex-column">
        <h2 class="order-title w-100 fw-bold text-lg">Order - 729213</h2>

        <div class="alert alert-success added" role="alert">
          <h4 class="alert-heading">Cart Finalized!</h4>
          <p>You have added all the items to cart successfully. Kindly look at your final order</p>
          <hr>
          <p class="mb-0">Proceed to payment after confirmation of the order items.</p>
        </div>
        
        <?php

            $grand = 0;
            
            
            
            ?>

        <div class="table-responsive">
          <table class="order-items-table table table-borderless">
            <tbody class="d-flex flex-column">

            @foreach ($products as $product)
            <tr class="order-item d-flex">

                    <td class="item-info">
                      <div class="d-flex flex-column">
                        <p class="item-title fw-bold text-md m-0">{{$product->name}} x{{$product->pivot->quantity}}</p>

                      </div>
                    </td>
                    <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">
                      <div class="item-price mt-auto">
                        <p class="m-0 d-block fw-light text-end text-md">{{$product->price}}  PKR</p>
                      </div>
                    </td>
            </tr>
            <?php

            $mul = (int)$product->pivot->quantity;
            $price = (int)$product->price;
            $grand = $grand + ($mul*$price)

            
            
            ?>
            @endforeach

              <!-- Order Item -->

            
              
              

              <tr class="order-item d-flex sum" id="summary-first">

                <td class="item-info">
                  <div class="d-flex flex-column">
                    <p class="item-title fw-bold text-md m-0">Total</p>

                  </div>
                </td>
                <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">
                  <div class="item-price mt-auto">
                    <p class="m-0 d-block fw-light text-end text-md">370,000 PKR</p>
                  </div>
                </td>
              </tr>

              <tr class="order-item d-flex sum">

                <td class="item-info">
                  <div class="d-flex flex-column">
                    <p class="item-title fw-bold text-md m-0">Discounts</p>

                  </div>
                </td>
                <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">
                  <div class="item-price mt-auto">
                    <p class="m-0 d-block fw-light text-end text-md">370,000 PKR </p>
                  </div>
                </td>
              </tr>

              <tr class="order-item d-flex sum">

                <td class="item-info">
                  <div class="d-flex flex-column">
                    <p class="item-title fw-bold text-md m-0">Grand Total</p>

                  </div>
                </td>
                <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">
                  <div class="item-price mt-auto">
                    <p class="m-0 d-block fw-light text-end text-md"><?php echo $grand?> PKR</p>
                  </div>
                </td>
              </tr>

              <!-- End Order Item -->
            </tbody>
          </table>
        </div>

        <div class="order-details w-100 d-flex flex-column" style="margin-top: 15px;">

            <div class="divide">
              <h3>Choose Address</h3>
              
              <form action="{{ route('address') }}" method="POST" id="address-form">
              {{ csrf_field() }}

                  <button class="btn btn-dark address-button text-center text-sm">
                      Add New Address
                  </button>
              </form>            
            </div>


            <div class="divide">
              <h3>Select Payment Method</h3>
                  <select name="payment" id="payment-options">

                    <option value="cod">Cash On Delivery</option>
                    <option value="card">Credit/Debit Card</option>

                  </select>

            </div>
            
          </div>
      </div>



      <form action="{{ route('final') }}" method="post" class="checkout-form">
        {{ csrf_field() }}

        


          
          <input type="hidden" name="data" class="data-con">
          <button type="submit" class="btn btn-dark checkout-button text-center text-sm">
            Finalize Order
            <img src="/img/chevron-right.svg" alt="checkout">
          </button>

      
      </form>
      
      
    </div>
    <!-- End Orders section -->
@endsection

@section('scripts')
    @parent

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>


      $( document ).ready(function() {
        var $arr = <?php echo json_encode($products); ?>;
        console.log($arr)



        $("#payment-options").on("change", function () {
          var $mode = $(this).find(":selected").val()
          if ($mode === "cod"){
            $(".checkout-button").text("Finalize Order")
          }else{
            $(".checkout-button").text("Proceed To Payment")

          }
          
        })

        $(".checkout-form").submit(function(e){
          var $arr = <?php echo json_encode($products); ?>;
          $(".data-con").val(JSON.stringify($arr))

          var $total = $('<input type="hidden" name="total"></input>')
          $total.val(<?php echo $grand;?>);

          var $mode = $('<input type="hidden" name="mode"></input>')
          $mode.val($("#payment-options").find(":selected").val());

          var $comment = $('<input type="hidden" name="comment" value="{{$comment}}"></input>')

          $(this).append($mode)
          $(this).append($total)
          $(this).append($comment)

          return true


        })

        $("#address-form").submit(function(e){

            var $comment = $('<input type="hidden" name="comment" value="{{$comment}}"></input>')
            $(this).append($comment)
            return true


        })


      });

      
    </script>
        

    


    
@endsection