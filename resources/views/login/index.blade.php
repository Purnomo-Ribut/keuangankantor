<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <title>Halaman Login</title>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="">
        <h1>Create Account</h1>
        <input type="text" placeholder="first name" />
        <input type="text" placeholder="second name" />
        <input type="email" placeholder="email" />
        <input type="number" placeholder="age" />
        <input type="password" placeholder="Password" name="pswd1" />
        <input type="password" placeholder="confirm passord" name="pswd2" />
        <button type="submit" onclick="matchPassword()">Sign Up</button>
      </form>
    </div>

    <!-- Login -->
    <div class="form-container sign-in-container">
      <form action=""  method="post">
      @csrf
        <h1>Login </h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>
          
        <!-- Menampilkan pesan kesalahan -->
        @if ($errors->any())
            <div class="alert alert-danger">
                
                    @foreach ($errors->all() as $error)
                        <b>{{ $error }}</b>
                    @endforeach
                </>
            </div>
        @endif
        </span>
        <input id="username" type="text" name="username" placeholder="Masukkan username" required autocomplete="username" autofocus />
        
        <input id="password" type="password" placeholder="Password" name="password" required autocomplete="current-password">


        <a href="#">Forgot your password?</a>
        <button type="submit" >Sign In</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start journey with us</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('js/login.js')}}"></script>
</body>

</html>