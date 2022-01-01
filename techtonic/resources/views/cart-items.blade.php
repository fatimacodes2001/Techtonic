@extends('layouts.app')

@section('title', 'Cart')

@section('styles')
    @parent

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/cart.css">
@endsection

@section('content')
    <h1 class="page-title text-center gap">Cart</h1>

    <div class="order-section d-flex flex-column align-items-center">
      <div class="order-details w-100 d-flex flex-column">
        <div class="table-responsive">
        <table class="order-items-table table table-borderless">
          <tbody class="d-flex flex-column">




          @foreach ($products as $product)


          <!-- Order Item -->
          <tr class="order-item d-flex" item="{{ $product->id }}">
              <td class="item-img p-0">
                <img class="responsive-img" src="{{ asset('storage/' . $product->images->first()->pic_path) }}" alt="item img">
              </td>
              <td class="item-info">
                <div class="d-flex flex-column">
                  <p class="item-title fw-bold text-md m-0">{{ $product->name }}</p>
                  <div class="item-description">
                    @foreach ($product->specs as $spec)

                    <p class="d-block text-sm fw-light m-0">{{ $spec->spec }}</p>

                    @endforeach

                  </div>
                </div>
              </td>
              <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">
                  <div class="item-control-buttons d-flex align-items-center">
                    <button class="delete-item-btn icon-btn">
                      <img src="/img/trash.svg" alt="Delete">
                    </button>

                    <div class="number-control-buttons d-flex align-items-center">
                      <button class="fw-bold minus">
                        <img src="/img/minus.svg">
                      </button>
                      <input class="fw-bold text-md text-center" type="number" value="{{ $product->pivot->quantity }}" name="number" id="item-number">
                      <button class="fw-bold plus">
                        <img src="/img/plus.svg">
                      </button>
                    </div>


                  </div>
                  <div class="item-price mt-auto">
                    <h4 class="m-0 d-block fw-bold text-end text-md">Price </h4>
                    <p class="m-0 d-block fw-light text-end text-md">{{ $product->price }} PKR</p>
                  </div>
              </td>
            </tr>
            <!-- End Order Item -->




          @endforeach

          <tr class="order-item d-flex">
              <td class="item-img p-0">
                <input type="text" name="comment" placeholder="Special Instructions..." class="comments">
              </td>
            </tr>

          





  
          </tbody>
        </table>
        </div>
      </div>
      <form class="next" action="{{ route('checkout') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="data" class="data">

        <button type="submit" class="btn btn-dark checkout-button text-center text-sm">
          Proceed to Checkout
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

      var $arr = <?php echo json_encode($products); ?>;

      function sendAjax(p_id, quantity, stock){


        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                  url: "/change-quantity",
                  type:"POST",
                  data:{
                    _token: _token,
                    quantity: quantity,
                    id: p_id,
                    stock: stock
                  }     
              });

              

      }


      $(".fw-bold.plus").on('click',function(){
        var $parent = $(this).parent();
        var $field = $parent.children("input");
        var $name = $parent.parents("tr").attr("item");

        for (var i = 0; i < $arr.length; i++){

          if($arr[i].id === parseInt($name)){

            if($arr[i].stock_quantity > 1){

              $arr[i].pivot.quantity += 1;
              $arr[i].stock_quantity -= 1;
              $field.val(parseInt($field.val()) + 1);
              sendAjax(parseInt($name), $arr[i].pivot.quantity, $arr[i].stock_quantity)



            }
           
          }

      } 
      })


      $(".fw-bold.minus").on('click',function(){

        var $parent = $(this).parent();
        var $field = $parent.children("input");
        var $name = $parent.parents("tr").attr("item");

        if(parseInt($field.val()) == 1){
            $parent.parents("tr").remove();
            for (var i = 0; i < $arr.length; i++){

              if($arr[i].id === parseInt($name)){

                $arr[i].pivot.quantity -= 1;
                $arr[i].stock_quantity += 1;
                sendAjax(parseInt($name), $arr[i].pivot.quantity, $arr[i].stock_quantity)

                delete $arr[i];
                }}

                
        }
        
        else{

          $field.val(parseInt($field.val()) - 1);
          for (var i = 0; i < $arr.length; i++){

            if($arr[i].id === parseInt($name)){

              $arr[i].pivot.quantity -= 1;
              $arr[i].stock_quantity += 1;
              sendAjax(parseInt($name), $arr[i].pivot.quantity, $arr[i].stock_quantity)



            }
          }

        }


        
      


      })

      $(".delete-item-btn").on("click", function(){

          var $parent = $(this).parent();
          $parent.parents("tr").remove();
          var $name = $parent.parents("tr").attr("item");


          for (var i = 0; i < $arr.length; i++){

              if($arr[i].id === parseInt($name)){

                $arr[i].stock_quantity += $arr[i].pivot.quantity;
                $arr[i].pivot.quantity = 0;
                sendAjax(parseInt($name), $arr[i].pivot.quantity, $arr[i].stock_quantity)

                delete $arr[i];

              }

            }





        
      })

      $(".next").submit(function (e) { 
        e.preventDefault
        var $comm = $('<input type="hidden" name="comments"></input>')
        $comm.val($("input.comments").val())
        $(this).append($comm)
        $("input.data").val(JSON.stringify($arr));
        return true;


       })



    </script>
    
@endsection