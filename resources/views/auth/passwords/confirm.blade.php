
@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- header section  -->
<div class="box" style="background: url(images/home-bg-2.jpg)">
   
    <section class="heading">
        <h1 id="account"></h1>
       <!-- login form section starts -->

<section class="login-form">

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <h3>Confirm Password</h3>
        <h6 class="verify_text">Please confirm your password before continuing.</h6>
   
        <div class="inputBox">
            <span class="fas fa-lock"></span>
            <input id="password" type="password" placeholder="enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        </div>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


        <input type="submit" value={{ __('Login') }} class="btn">
        
        @if (Route::has('password.request'))
        <a class="btn" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
    </form>

</section>

<!-- login form section ends -->

    </section>

<!-- header section -->



@include('layouts.footer')
