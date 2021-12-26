@extends('layouts.app')

@section('title', 'Add Review')

@section('styles')
    @parent

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="/css/add-review.css">
@endsection

@section('content')
    <h1 class="page-title text-center gap">Write a Review</h1>

     <div class="order-section d-flex flex-column align-items-center margin">
      <div class="order-details w-100">
        <form method="POST" action="{{ route('reviews.store', $product['id'] )}}">
          @csrf

          <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="order-title fw-bold text-lg mb-0">{{ $product['name'] }}</h2>
            <button class="btn btn-dark review-btn btn-small">
              View Order
            </button>
          </div>

          @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                  <h4 class="alert-heading">Whoops!</h4>
                  <p>There were some problems with your input.</p>
                  <hr>

                    @foreach ($errors->all() as $error)
                      <p class="mb-0">{{ $error }}</p> 
                    @endforeach

              </div>
          @endif

          <div class="table-responsive">
            <table class="order-items-table table table-borderless">
              <tbody class="d-flex flex-column">

                <tr class="order-item d-flex align-items-center justify-content-center sum">
                  <td class="item-info">
                    <div class="d-flex flex-column">
                      <p class="review-heading text-md m-0">Overall Rating</p>

                    </div>
                  </td>

                  <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">
                    <div class="rating-sec">

                      @for ($i = 5; $i > 0 ; $i--)

                         <label>
                          <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10 0L13.09 6.26L20 7.27L15 12.14L16.18 19.02L10 15.77L3.82 19.02L5 12.14L0 7.27L6.91 6.26L10 0Z" fill="currentColor"/>
                          </svg>
                          <input type="radio" name="rating" value="{{ $i }}" />
                        </label>

                      @endfor

                    </div>
                  </td>
                </tr>

                <tr class="order-item d-flex flex-column sum">
                  <td class="item-info">
                    <div class="d-flex flex-column">
                      <p class="review-heading text-md m-0">Apprise your Experience</p>
                    </div>
                  </td>

                  <td class="d-flex p-0 mt-4">
                    <textarea name="text" id="text" rows="7" placeholder="Write your review..." class="review-input"></textarea>       
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-dark review-btn btn-big">
              Post Review
            </button>
          </div>
        </form>
      </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
@endsection