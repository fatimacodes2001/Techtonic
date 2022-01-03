<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- bootstrap -->

  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Css main -->



  <link rel="stylesheet" href="{{asset('css/master.css')}}" />
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('css/home.css')}}" />






</head>

<body>
  <div class="container-lg">

    <nav class="navbar navbar-expand-lg navbar-light d-flex align-items-start">
      <a class="navbar-brand" href="{{route('home')}}" style="margin-left: 5px;">
        <img src="/img/logo.svg" height="35" alt="techtonic-logo">
      </a>

      <a class="show-it nav-item nav-link mob" href="cart-items.html"> <img src="/img/cart.svg" alt="cart"> </a>
      <a class="show-it nav-item nav-link mob"> <img src="/img/user.svg" alt="user"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div style="width: 100%;">
        <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarTogglerDemo01">
          <ul class="navbar-nav">
            <a class="nav-item nav-link" href="{{route('about-us')}}"> About Us </a>
            <a class="nav-item nav-link"> Store </a>
            <a class="nav-item nav-link" href="{{route('categories.index')}}"> Categories </a>
          </ul>
        </div>
      </div>

      <a class="hide nav-item nav-link mob" href="{{ route('cart') }}"> <img src="/img/cart.svg" alt="cart"> </a>
      <a class="hide nav-item nav-link mob" href="{{route('account')}}"> <img src="/img/user.svg" alt="user"></a>
    </nav>



    <section id="jeff">
      <div class="img-holder text-center">
        <img class="dp" src="{{$user->profile_pic}}" alt="" >
        <h3 id="name-heading">{{$user->first_name}} {{$user->last_name}}</h3>
        <form action="{{ route('sign-out') }}">

          <button type="submit" class="btn btn-dark  text-center text-sm" id="sign-out-btn">
            Sign Out
          </button>

        </form>

      </div>




      <div class="row table-holder justify-content-between">
        <div class="taab">
          <div class="">
            <div class="row justify-content-between">
              <div class="col-md-3">
                <div class="nav side-bar flex-md-column  nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <button class="nav-link col-6 col-md-12" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal Details</button>
                  <button class="nav-link active col-6 col-md-12 " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Orders</button>
                  <button class="nav-link col-6 col-md-12" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Addresses</button>

                </div>
              </div>
              <div class="col-md-8 content-t">
                <div class="tab-content" id="v-pills-tabContent">

                  <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <td>
                            <div class="accordion" id="accordionExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                  <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Placed
                                  </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    @foreach ($placed as $order)

                                    <div class="order-details d-flex justify-content-between pt-4">
                                      <h3>Order#{{$order->id}} - <span>{{$order->total}} PKR</span></h3>

                                      <form action="{{ route('order') }}" method="POST">
                                        {{ csrf_field() }}

                                        <a href="javascript:;" onclick="parentNode.submit();">View Order</a>
                                        <input type="hidden" name="id" value="{{ $order->id }}" />
                                      </form>

                                    </div>


                                    @endforeach


                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="accordion" id="accordion-two">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    In Process
                                  </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion-two">
                                  <div class="accordion-body">
                                    @foreach ($processing as $order)

                                    <div class="order-details d-flex justify-content-between pt-4">
                                      <h3>Order#{{$order->id}} - <span>{{$order->total}} PKR</span></h3>
                                      <form action="{{ route('order') }}" method="POST">
                                        {{ csrf_field() }}

                                        <a href="javascript:;" onclick="parentNode.submit();">View Order</a>
                                        <input type="hidden" name="id" value="{{ $order->id }}" />
                                      </form>
                                    </div>


                                    @endforeach

                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="accordion" id="accordionThree">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    Shipped
                                  </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionThree">
                                  <div class="accordion-body">

                                    @foreach ($shipped as $order)
                                    <div class="order-details d-flex justify-content-between pt-4">
                                      <h3>Order#{{$order->id}} - <span>{{$order->total}} PKR</span></h3>

                                      <form action="{{ route('order') }}" method="POST">
                                        {{ csrf_field() }}

                                        <a href="javascript:;" onclick="parentNode.submit();">View Order</a>
                                        <input type="hidden" name="id" value="{{ $order->id }}" />
                                      </form>
                                    </div>
                                    @endforeach

                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="accordion" id="accordion-four">
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-four" aria-expanded="true" aria-controls="collapse-four">
                                    Past Orders
                                  </button>
                                </h2>
                                <div id="collapse-four" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion-two">
                                  <div class="accordion-body">

                                    @foreach ($delivered as $order)
                                    <div class="order-details d-flex justify-content-between pt-4">
                                      <h3>Order#{{$order->id}} - <span>{{$order->total}} PKR</span></h3>

                                      <form action="{{ route('order') }}" method="POST">
                                        {{ csrf_field() }}

                                        <a href="javascript:;" onclick="parentNode.submit();">View Order</a>
                                        <input type="hidden" name="id" value="{{ $order->id }}" />
                                      </form>

                                    </div>
                                    @endforeach

                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="tab-container">

                      Wallet
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="tab-container">

                      Refunds
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="tab-container">

                      Addresses
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <div class="tab-container">

                      Payment Options
                    </div>
                  </div>

                  <!-- ...........................................
                              personal information
                  ........................................... -->
                  <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <form action="{{route('auth.edit')}}" method="post" enctype="multipart/form-data" class="tab-container">
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
                      <input type="text" name="current-user" value="{{$user->email}}" hidden>
                      <div class="general-info d-flex justify-content-between">
                        <h2>General Information</h2>
                        <img id="edit-details" onclick="edit()" src="/img/edit.svg" alt="">
                      </div>
                      <div class="row ">
                        <label for="inputEmail3" class="col-2  col-form-label d-flex align-items-center">Email</label>
                        <div class="col-10 input-holder">
                          <input type="email" name="email" class="form-control" id="inputEmail3" value="{{$user->email}}" disabled="true">
                        </div>
                        <div class="col-md-6 f-name mb-0">
                          <div class="row">
                            <label for="firstname" class="col-2 col-md-4 d-flex  col-form-label  align-items-center">First Name</label>
                            <div class="col-10 col-md-8  input-holder ">
                              <input type="text" name="first-name" class="form-control" id="firstname" value="{{$user->first_name}}" disabled="true">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 f-name l-name">
                          <div class="row">
                            <label for="lastname" class="col-form-label col-2 col-md-4 d-flex justify-content-md-center justify-content-start align-items-center">Last Name</label>
                            <div class="col-10 col-md-8 input-holder">
                              <input type="text" name="last-name" class="form-control" id="lastname" value="{{$user->last_name}}" disabled="true">
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="btn-link">
                        <a onclick="openModal()" style="pointer-events: none;background-color: grey;" id="view-profile" href="#">Edit Profile Picture</a>
                      </div>
                      <!-- Error display here -->
                      @if(count($errors)>0)
                      <div class="alert alert-danger">
                        <br>
                        <ul>
                          @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                      <div class="security-info d-flex justify-content-between">
                        <h2>Security Information</h2>
                        <div class="save-link" id="save-details" hidden>
                          <button type="submit" href="#">Save Changes <img src="/img/save.svg" alt=""></button>
                        </div>
                      </div>
                      <div class="row">
                        <label for="inputPassword1" class="col-2 col-md-3 col-form-label d-flex align-items-center label-pass">Current Passowrd</label>
                        <div class="col-md-9 col-10 input-pass">
                          <input type="password" name="old-password" class="form-control" id="inputPassword1" placeholder="Enter your Current password here" disabled="true">
                          <img onclick="showOldPassword()" src="/img/eye.png" alt="">
                        </div>
                        <label for="inputPassword2" class="col-2 col-md-3 col-form-label f-name d-flex label-pass align-items-center">New Passowrd</label>
                        <div class="col-md-9 col-10 input-pass f-name">
                          <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter your New password here" disabled="true">
                          <img onclick="showPassword()" src="/img/eye.png" alt="">
                        </div>

                        <label for="inputPassword3" class="col-2 col-md-3 col-form-label d-flex align-items-center label-pass">Repeat New Passowrd</label>
                        <div class="col-md-9 col-10 input-pass">
                          <input type="password" name="password_confirmation" class="form-control" id="pwd-rpt" placeholder="Kindly Repeat your New password " disabled="true">
                          <img onclick="showRepeatPassword()" class="pr" src="/img/eye.png" alt="">
                        </div>
                      </div>
                      <input type="file" onchange="getImagePreview(event)" id="select-file" name="select-file" value="{{old('select-file')}}" hidden >

                    </form>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>


    <div class="modal-container" id="modal-container">
      <div class="modal-popup">
        <div class="upload-profile-pic-head">
          <h3>
            <b>
              Profile Picture
            </b>
          </h3>
          <img src="/img/x.svg" id="close" onclick="closeModal()">
          </img>
        </div>
        <div class="upload-profile-pic">
          <label id="select-img-label" for="select-file">
            <div class="upload-hidden">
              <h3>
                <b>
                  Select Picture
                </b>
              </h3>
            </div>
            <img id="old-img" class="old-profile-pic" src="{{$user->profile_pic}}" alt="Profile Picture">
          </label>
        </div>
      </div>
    </div>


    <div class="footer">
      <div class="footer-sec col-sm-4 col-12 d-flex flex-column justify-content-between">
        <div class="address">
          <div class="lines address-parts"> <span class="dark">781 </span>Sheila Lane</div>
          <div class="lines address-parts"><span class="dark">City </span>Goshute</div>
          <div class="lines address-parts"><span class="dark">State/Province </span>Nevada</div>
        </div>
        <div class="address">
          <div class="lines address-parts"><span class="dark">2187</span> College Street</div>
          <div class="lines address-parts"><span class="dark">City </span>Florence</div>
          <div class="lines address-parts"><span class="dark">State/Province </span>Albama</div>
        </div>
      </div>

      <div class="footer-sec col-sm-4 col-12 items">
        <h2 class="page-title bottom-name">
          TECHTONIC
        </h2>
        <P class="normal bottom-subtitle">
          Welcome to a world of Luxury
        </P>
        <img class="bottom-logo" src="/img/big-logo.svg" alt="logo">
      </div>

      <div class="footer-sec col-sm-4 col-12 right">
        <h4 class="footer-heading">Reach Out</h4>
        <div class="icons">
          <img src="/img/sn1.svg" alt="facebook">
          <img src="/img/sn2.svg" alt="linkedin">
          <img src="/img/sn3.svg" alt="twitter">
          <img src="/img/sn4.svg" alt="phone">
        </div>
        <p class="normal copyright">Copyright © 2021 <span>TECHTONIC</span> Inc. All rights reserved</p>
      </div>
    </div>


  </div>





  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <script src="{{asset('/js/script.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>