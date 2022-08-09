@include('layouts.header')
<!-- header section  -->
<div class="box" style="background: url(images/home-bg-2.jpg) ">
<section class="heading">
    <h1 id="account" >account</h1>
    <!-- register form section starts -->

<section class="register-form">

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3>register now</h3>
        <!-- Name -->
        <div class="inputBox">
            <span class="fas fa-user"></span>
            <input id="name" type="text" placeholder="enter your name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
        </div>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <!-- email -->
        <div class="inputBox">
            <span class="fas fa-envelope"></span>
            <input id="email" type="email" placeholder="enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>
        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
         <!-- password -->
        <div class="inputBox">
            <span class="fas fa-lock"></span>
            <input id="password" type="password" placeholder="enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
           
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

         <!-- confirm password -->

        <div class="inputBox">
            <span class="fas fa-lock"></span>
            <input id="password-confirm" placeholder="confirm your password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
           
        </div>
        
        <input type="submit" value="sign up" class="btn">
        <a href="login" class="btn">already have an account</a>
    </form>

</section>

<!-- register form section ends -->

</section>

<!-- header section -->





@include('layouts.footer')