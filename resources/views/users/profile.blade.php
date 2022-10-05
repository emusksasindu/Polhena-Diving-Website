@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<section class="UserProfile">

    <div class="content">
        <div class="gap"></div>
        <h1 class="heading">User Profile</h1>
        
        <form action="">
            <h4>Name</h4>
            <input type="text" name="name" value='{{Auth::user()->name}}' placeholder="enter your name" id="" class="field">
            <h4>Email</h4>
            <input type="email" name="email" value='{{Auth::user()->email}}' placeholder="enter your email" id="" class="field">
            
            <div class="flex SmallGap">
                <input type="submit" value="Edit" class="btn"> 
                <a class="btn">Change Password</a>
            </div>
            
        </form>
    </div>
    
   
</section>

@include('layouts.footer')