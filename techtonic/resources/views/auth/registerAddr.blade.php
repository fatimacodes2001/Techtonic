@extends('layouts.main')

@section('title', 'Techtonic')

@section('styles')
@parent

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/css/home.css">

<link rel="stylesheet" href="/css/signup2.css">
<link rel="stylesheet" href="/css/cart.css">

@endsection

@section('content')





<section class="sign-up">
  <div class="sign-up-box text-center row mx-4 mb-2 mt-">
    <div class="
            col-md-5
            d-flex
            flex-column
            align-items-center
            justify-content-center
          ">
      <h2>Sign Up</h2>
      <p>Just About done</p>
    </div>
    <div id="sign-up-form" class="col-12 col-sm-10 col-md-7 mt-1 m-auto">
      <form action="{{route('auth.save')}}" method="post" enctype="multipart/form-data">
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

        <input type="text" class="form-control" name='street-address' placeholder="Enter Street Address" id="street-address" value="{{old('street-address')}}">

        <input type="text" class="form-control" name='city' placeholder="Enter City" id="city" value="{{old('city')}}">

        <input type="text" class="form-control" name='country' placeholder="Enter Country" id="country" value="{{old('country')}}">

        <input type="number" class="form-control" name='postal-code' placeholder="Enter Postal Code" id="postal-code" value="{{old('postal-code')}}">

        <button type="submit" class="btn btn-dark">Submit</button>
        @if(count($errors)==0)
        <input type="email" class="form-control" name='email' id="email" value="{{session()->get( 'email' ) }}" hidden>
        <input type="text" class="form-control w-50 me-3" name='first-name' id="first-name" value="{{session()->get( 'first_name' ) }}" hidden>
        <input type="text" class="form-control w-50" name='last-name' id="last-name" value="{{session()->get( 'last_name' ) }}" hidden>
        <input type="password" class="form-control" name='password' id="pwd" value="{{session()->get( 'password' ) }}" hidden>
        <input type="text" id="select-file" name="select-file" value="{{session()->get( 'select-file' )}}" hidden>
        @endif
        @if(count($errors)>0)
        <input type="email" class="form-control" name='email' id="email" value="{{old('email')}}" hidden>
        <input type="text" class="form-control w-50 me-3" name='first-name' id="first-name" value="{{old('first-name')}}" hidden>
        <input type="text" class="form-control w-50" name='last-name' id="last-name" value="{{old('last-name')}}" hidden>
        <input type="password" class="form-control" name='password' id="pwd" value="{{old('password')}}" hidden>
        <input type="text" id="select-file" name="select-file" value="{{old('select-file')}}" hidden>
        <div class="alert alert-danger">
          <br>
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <input type="hidden" name="pass" value="{{ session()->get('pass') }}" />

      </form>
    </div>
  </div>

</section>

</div>




@endsection

@section('scripts')
@parent
<script src="/js/flickity.pkgd.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/js/main.js"></script>
<script src="/js/script.js"></script>
@endsection