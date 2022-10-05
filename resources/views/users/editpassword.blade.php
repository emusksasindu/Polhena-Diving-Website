@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<section class="UserProfile">

    <div class="content">
        <div class="gap"></div>
        <h1 class="heading">Update Password</h1>
        
        <form action="">
            <h4 class="SmallGap">Current Password</h4>
            <input type="text" name="name" value='{{Auth::user()->name}}' placeholder="enter your name" id="" class="field">
            <h4 class="SmallGap">New Password</h4>
            <input type="email" name="email" value='{{Auth::user()->email}}' placeholder="enter your email" id="" class="field">
            <h4 class="SmallGap">Confirm Password</h4>
            <input type="email" name="email" value='{{Auth::user()->email}}' placeholder="enter your email" id="" class="field">
            <div class="flex SmallGap">
                <a class="btn">Update Password</a>
            </div>
            
        </form>
    </div>
    
   
</section>

@include('layouts.footer')