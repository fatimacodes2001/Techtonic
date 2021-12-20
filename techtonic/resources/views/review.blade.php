@extends('layouts.app')

@section('title', 'Review')

@section('styles')
    @parent

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/cart.css">
    <link rel="stylesheet" href="/css/review.css">
@endsection

@section('content')
    <h1 class="page-title text-center gap">Write a Review</h1>

     <div class="order-section d-flex flex-column align-items-center margin">
      <div class="order-details w-100">
        <div class="d-flex justify-content-between align-items-center mb-5">
          <h2 class="order-title fw-bold text-lg mb-0">Iphone 13 Pro Max</h2>
          <button class="btn btn-dark review-btn btn-small">
            View Order
          </button>
        </div>

        <div class="table-responsive">
          <table class="order-items-table table table-borderless">
            <tbody class="d-flex flex-column">

              <tr class="order-item d-flex align-items-center sum">

                <td class="item-info">
                  <div class="d-flex flex-column">
                    <p class="review-heading text-md m-0">Overall Rating</p>

                  </div>
                </td>
                <td class="ms-auto p-0 h-auto d-flex flex-column justify-content-between">

                  <div class="number-control-buttons d-flex align-items-center">
                    <img src="/img/star-fill.svg">
                    <img src="/img/star-fill.svg">
                    <img src="/img/star-fill.svg">
                    <img src="/img/star-fill.svg">
                    <img src="/img/star-fill.svg">
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
                  <form action="">
                      <textarea name="" id="" cols="100" rows="7" class="review-input"></textarea>
                  </form>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="d-flex justify-content-center">
          <button class="btn btn-dark review-btn btn-big">
            Post Review
          </button>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection