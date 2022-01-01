@extends('layouts.main')

@section('title', "Sign In")

@section('styles')
@parent

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/sign-in2.css">
<link rel="stylesheet" href="/css/home.css">

@endsection
@section('content')




<section class="sign-in d-flex justify-content-center align-items-center">
  <div class="sign-in-box text-center mx-4">
    <h2>Sign in</h2>
    <p>Welcome back to a world of Luxury</p>
    <form action="{{route('auth.check')}}" method="post">
      @if(Session::get('fail'))
      <div class="alert alert-danger>">
        {{Session::get('fail')}}
      </div>
      @endif
      @csrf
      <input type="email" class="form-control" name='email' placeholder="Enter email" id="email" value="{{old('email')}}">
      <div class="password">
        <input type="password" class="form-control" name='password' placeholder="Enter password" id="pwd">
        <div class="eye">
          <img class="img-fluid" onclick="showPassword()" src="/img/eye.png" alt="show" />
        </div>
      </div>


      <button type="submit" class="btn btn-dark">Submit</button>
      <a class="skip link-dark" style="display: block; margin-top:10px;" href="{{route('auth.register')}}"> Sign Up</a>
    </form>
  </div>
</section>
@endsection
@section('scripts')
@parent
<script src="/js/flickity.pkgd.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/js/main.js"></script>
<script src="/js/script.js"></script>
@endsection