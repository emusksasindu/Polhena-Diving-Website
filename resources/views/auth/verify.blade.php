@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- header section  -->
<div class="box" style="background: url(images/home-bg-2.jpg)">
   
    <section class="heading">
        <h1 id="account"></h1>
       <!-- login form section starts -->

<section class="login-form">

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
        <div class="verify_text">{{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},</div>
        <input type="submit" value={{ __('click here to request another') }} class="btn">
      
    </form>

</section>

<!-- login form section ends -->

    </section>

<!-- header section -->



@include('layouts.footer')
