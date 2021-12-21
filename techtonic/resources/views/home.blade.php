@extends('layouts.app')

@section('title', 'Techtonic')

@section('styles')
    @parent

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
      integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
      integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/home-categories.css">
@endsection

@section('content')
    <div class="gap">
      <h1 class="page-title text-center">TECHTONIC</h1>
      <p class="page-subtitle text-center">Welcome to a world of luxury</p>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="image-sec">
             <div class="page-title splendour">Outclassed <br /> Splendour</div>
            <img src="/img/unsplash.png" alt="carousel-img-1" class="main-img ">
          </div>
        </div>

        <div class="carousel-item">
          <div class="image-sec">
             <div class="page-title splendour">Outclassed <br /> Splendour</div>
            <img
              src="https://images.unsplash.com/photo-1549439602-43ebca2327af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
              alt="carousel-img-2" class="main-img ">
          </div>
        </div>

        <div class="carousel-item">
          <div class="image-sec">
             <div class="page-title splendour">Outclassed <br /> Splendour</div>
            <img
              src="https://images.unsplash.com/photo-1483985988355-763728e1935b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
              alt="carousel-img-3" class="main-img ">
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
   
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div id="trends" class="row">
      <div class="col-12 col-md-5 col-lg-6 trends-left">
        <h1 class="page-title">TOP<br>TRENDS</h1>
        <button type="button" class="btn btn-dark">Explore All Categories <i class="bi bi-chevron-right"></i></button>
      </div>
      <div class="col-12 col-md-7 col-lg-6 trends-right">
        <div class="row">
          <div class="col-6">
            <div class="card trend-card text-white">
              <img
                src="https://images.unsplash.com/photo-1578840602674-bd891cb7ea5b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                class="card-img" alt="...">
              <div class="card-img-overlay">
                <a href="#">
                  <h5 class="category-title">Smartphones</h5>
                </a>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card trend-card text-white">
              <img
                src="https://images.unsplash.com/photo-1548169874-53e85f753f1e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=710&q=80"
                class="card-img" alt="...">
              <div class="card-img-overlay">
                <a href="#">
                  <h5 class="category-title">Watches</h5>
                </a>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card trend-card text-white">
              <img
                src="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                class="card-img" alt="...">
              <div class="card-img-overlay">
                <a href="#">
                  <h5 class="category-title">Fragrances</h5>
                </a>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card trend-card text-white">
              <img
                src="https://images.unsplash.com/photo-1549439602-43ebca2327af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                class="card-img" alt="...">
              <div class="card-img-overlay">
                <a href="#">
                  <h5 class="category-title">Finest<br>Commodities</h5>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="top-categories" class="category-row">
      <h1 class="category-title text-center">Top Products</h1>
      <p class="category-subtitle text-center">Furnishing your every Desire</p>

      <div class="row-scroll">
        <div class="card category-card text-white">
          <img
            src="https://images.unsplash.com/photo-1578840602674-bd891cb7ea5b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
            class="card-img" alt="...">
          <div class="card-img-overlay">
            <a href="#">
              <h5 class="category-title">iPhone 13</h5>
            </a>
          </div>
        </div>

        <div class="card category-card text-white">
          <img
            src="https://images.unsplash.com/photo-1548169874-53e85f753f1e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=710&q=80"
            class="card-img" alt="...">
          <div class="card-img-overlay">
            <a href="#">
              <h5 class="category-title">Piaget</h5>
            </a>
          </div>
        </div>

        <div class="card category-card text-white">
          <img
            src="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
            class="card-img" alt="...">
          <div class="card-img-overlay">
            <a href="#">
              <h5 class="category-title">CHANEL</h5>
            </a>
          </div>
        </div>

        <div class="card category-card text-white">
          <img
            src="https://images.unsplash.com/photo-1549439602-43ebca2327af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
            class="card-img" alt="...">
          <div class="card-img-overlay">
            <a href="#">
              <h5 class="category-title">Lubiton <br /> Sandal</h5>
            </a>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
      integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/script.js"></script>
@endsection