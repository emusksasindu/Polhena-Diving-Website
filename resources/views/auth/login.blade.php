@include('layouts.header')
<!-- header section  -->
<div class="box" style="background: url(images/home-bg-2.jpg)">
   
    <section class="heading">
        <h1 id="account"></h1>
       <!-- login form section starts -->

<section class="login-form">

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h3>user login</h3>
        <div class="inputBox">
            <span class="fas fa-user"></span>
            <input id="email" type="email" placeholder="enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
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
        <div class="flex">
             <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
           
        </div>
        @if (Route::has('password.request'))
        <a class="btn" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
        <a href="register" class="btn">create an account</a>
    </form>

</section>

<!-- login form section ends -->

    </section>

<!-- header section -->



@include('layouts.footer')