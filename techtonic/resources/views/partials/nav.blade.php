<nav class="navbar navbar-expand-lg navbar-light d-flex align-items-start">
    <a class="navbar-brand" href="{{route('home')}}" style="margin-left: 5px;">
        <img src="/img/logo.svg" height="35" alt="techtonic-logo">
    </a>

    <a class="show nav-item nav-link mob" href="cart-items.html"> <img src="/img/cart.svg" alt="cart"> </a>
    <a class="show nav-item nav-link mob"> <img src="/img/user.svg" alt="user"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
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
    <a class="hide nav-item nav-link mob"> <img src="/img/user.svg" alt="user"></a>
</nav>