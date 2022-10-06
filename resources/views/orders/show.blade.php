@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<section class="UserProfile">

    <div class="content">
        <div class="gap"></div>
        <h1 class="heading">User Profile</h1>
        
        <form action="">
            <h4>Name</h4>
            
            <h4>Email</h4>
            
            
            <div class="flex SmallGap">
                <input type="submit" value="Edit" class="btn"> 
                <a href='/editpassword' class="btn">Change Password</a>
            </div>
            
        </form>
    </div>
    
   
</section>

@include('layouts.footer')