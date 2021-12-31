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
    <link rel="stylesheet" href="/css/flickity.css" media="screen">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/categories.css">
    <link rel="stylesheet" href="/css/home-categories.css">
    <link rel="stylesheet" href="/css/signup.css" />
@endsection

@section('content')

<div class="main-gallery js-flickity"
  data-flickity-options='{ "imagesLoaded": true , "cellAlign": "center", "contain": true , "wrapAround": true, "autoPlay" : true , "bgLazyLoad": true , "prevNextButtons": false , "pageDots": false}'>
  <div>
    <img src="https://images.unsplash.com/photo-1527246574940-ebf9c5ffd9a9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1925&q=80" alt="carousel-img-1">
  </div>
  <div>
    <img src="https://images.unsplash.com/photo-1617351166759-427aff10882e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="carousel-img-2" >
    
  </div>
    <div>
  <img src="https://images.unsplash.com/photo-1526786220381-1d21eedf92bf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" alt="carousel-img-2" >
    
  </div>
  <div>
    <img src="https://images.unsplash.com/photo-1469796466635-455ede028aca?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="carousel-img-2" >
      
  </div>
  <div>
    <img src="https://images.unsplash.com/photo-1523496922380-91d5afba98a3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1932&q=80" alt="carousel-img-2" >
    
  </div>
  <div>
    <img src="https://images.unsplash.com/photo-1541239370886-851049f91487?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="carousel-img-2" >
      
  </div>
  <div>
    <img src="https://images.unsplash.com/photo-1528154291023-a6525fabe5b4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1964&q=80" alt="carousel-img-2" >
        
  </div>
  <div>
    <img src="https://images.unsplash.com/photo-1577473403731-a36ec9087f44?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="carousel-img-2" >
        
  </div>
  <div>
    <img src="https://images.unsplash.com/photo-1492707892479-7bc8d5a4ee93?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1965&q=80" alt="carousel-img-2" >
            
  </div>
  <div>
    <img src="https://images.unsplash.com/photo-1569679632387-78cd4c00f9da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1854&q=80" alt="carousel-img-2" >
  </div>

</div>


  <h1>{{session()->get( 'select-file' )}}</h1>
  <section class="sign-up d-flex justify-content-center align-items-center">
      <div class="sign-up-box text-center row">
        <div
          class="
            col-md-5
            d-flex
            flex-column
            align-items-center
            justify-content-center
          "
        >
          <h2>Sign up</h2>
          <p>Dive into a world of Luxury</p>
        </div>
        <div class="col-md-7">
          <form action="{{route('auth.save')}}" method="post" enctype="multipart/form-data" >
            @if(Session::get('success'))
            <div class="alert alert-succuess>">
              {{Session::get('success')}}
            </div> 
            @endif
            @if(Session::get('fail'))
            <div class="alert alert-danger>">
              {{Session::get('fail')}}
            </div> 
            @endif
            @csrf
              <input type="email"  class="form-control" name='email'  id="email" value="{{session()->get( 'email' ) }}" hidden>
              <input type="text"  class="form-control w-50 me-3" name='first-name' id="first-name" value="{{session()->get( 'first_name' ) }}" hidden>
              <input type="text"  class="form-control w-50" name='last-name'  id="last-name" value="{{session()->get( 'last_name' ) }}" hidden>
              <input type="password"  class="form-control" name='password' id="pwd" value="{{session()->get( 'password' ) }}" hidden>
              <input type="text" style="visibility:hidden;" id="select-file"  name="select-file" value="{{session()->get( 'select-file' )}}">

              <input type="text" class="form-control" name='street-address' placeholder="Enter Street Address" id="street-address" value="{{old('street-address')}}">
              <span class="text-danger">@error('street-address'){{$message}}@enderror</span>
              
              <input type="text" class="form-control" name='city' placeholder="Enter City" id="city" value="{{old('city')}}">
              <span class="text-danger">@error('city'){{$message}}@enderror</span>
              
              <input type="text" class="form-control" name='country' placeholder="Enter Country" id="country" value="{{old('country')}}">
              <span class="text-danger">@error('country'){{$message}}@enderror</span>
              
              <input type="number" class="form-control" name='postal-code' placeholder="Enter Postal Code" id="postal-code" value="{{old('postal-code')}}">
              <span class="text-danger">@error('postal-code'){{$message}}@enderror</span>
              
              <button type="submit" class="btn btn-dark">Submit</button>
              <br>
              <a href="{{route('auth.login')}}"> Sign In</a>
       
        
            </form>
          </div>
        </div>
      
      </section>
      
  </div>



  
@endsection

@section('scripts')
    @parent
    <script src="/js/flickity.pkgd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
      integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="/js/script.js"></script>
@endsection