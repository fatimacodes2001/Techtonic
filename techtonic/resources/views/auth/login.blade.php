<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
    <div class="row" >
        <div class="col-md-4 col-md-offset-4">
        <form action="{{route('auth.check')}}" method="post" >
          @if(Session::get('fail'))
          <div class="alert alert-danger>">
          {{Session::get('fail')}}
          </div> 
          @endif
          @csrf
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name='email' placeholder="Enter email" id="email" value="{{old('email')}}">
    <span class="text-danger">@error('email'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name='password' placeholder="Enter password" id="pwd">
    <span class="text-danger">@error('password'){{$message}}@enderror</span>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{route('auth.register')}}"> Sign Up</a>
</form>    
        </div>
        
    </div>      
    </div>

</body>
</html>