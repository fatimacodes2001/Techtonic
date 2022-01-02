<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>@yield('title')</title>
        <link rel="icon" type="image/svg" href="/img/logo.svg">
      
        @section('styles')
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="/css/bootstrap.min.css">
        @show
    </head>
    <body>
        <div class="container-lg">  

            @include('partials.nav')
                
        </div>
        
        @yield('content')
        

        @section('scripts')
            <script src="/js/bootstrap.min.js"></script>
        @show
    </body>
</html>