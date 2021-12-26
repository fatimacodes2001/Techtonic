@extends('layouts.app')

@section('title', 'Cart')

@section('styles')
    @parent

    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="/css/style.css">
@endsection

@section('content')
    <h1 class="page-title text-center gap">Cart</h1>

    


    <div class="order-section d-flex flex-column align-items-center">
      <div class="order-details w-100 d-flex flex-column">
        <div class="table-responsive">
        <table class="order-items-table table table-borderless">
          <tbody class="d-flex flex-column">




          

          

          <!-- Order Item -->
          <tr class="order-item d-flex" item="{{ $product->id }}">
              <td class="item-img p-0">
                <img class="responsive-img" src="/img/phone.png" alt="item img">
              </td>
              <td class="item-info">
                <div class="d-flex flex-column">
                  <p class="item-title fw-bold text-md m-0">Name</p>
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

    <script>
        var $arr = <?php echo json_encode($data); ?>;
        console.log($arr)

    </script>

    
    
@endsection