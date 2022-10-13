
@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- header section  -->
<div class="box" style="background: url(images/home-bg-2.jpg) ">
    <section class="heading">
        <h1 id="account"></h1>
        <!-- register form section starts -->

        <section class="register-form">

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h3>reset password</h3>
                @if (session('status'))
                <div class="verify_text" role="alert">
                    {{ session('status') }}
                </div>
               @endif
                <!-- email -->
                <div class="inputBox">
                    <span class="fas fa-envelope"></span>
                    <input id="email" type="email" placeholder="enter your email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
               

                <input type="submit" value="{{ __('Send Password Reset Link') }}" class="btn">
            </form>

        </section>

        <!-- register form section ends -->

    </section>

    <!-- header section -->





    @include('layouts.footer')


