<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polhena Diving Center</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('https://unpkg.com/swiper@7/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/layout/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">


</head>
<body>
    
<!-- header section starts  -->

<header class="header">

<a href="/home" class ="logo"> <img src="{{ asset('images\PDC Logo.png') }}" alt="Image" height="60" width="251.76"> </a>

    <nav class="navbar">
        <div id="nav-close" class="fas fa-times"></div>
        <a href="{{ asset('home') }}">home</a>
        <a href="{{ asset('about') }}">about</a>
        <a href="{{ asset('/products') }}">products</a>
        <a href="{{ asset('/services') }}">services</a>
        <a href="{{ asset('/home#reviews') }}">reviews</a>
        <a href="{{ asset('/home#blogs') }}">blogs</a>
        <a class="icons">    
            <a href="{{ asset('/cart') }}" class="fas fa-shopping-cart"></a>
        </a>
        <a class="icons">    
            <a id="search-btn" class="fas fa-search"></a>
        </a>
         <a>

            
         </a>
        
        
    
    </nav>
    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>   
    </div>
   

  

 


      
    @if (Auth::check())
    <ul class="ul-login">
        <li class="dropdown-login">
            <div class="icons">
                <a  href="javascript:void(0)" class="fas fa-user"></a>
            </div>
         
          <div class="dropdown-content-login">
            <a href="{{ asset('/profile') }}">Profile</a>
            <a href="{{ asset('/order') }}">Order History</a>
            <a  href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
         </a>
          </div>
        </li>
      </ul>
                         @else
                         <ul class="ul-login">
                            <li  class="dropdown-login" >
                                <div class="icons">
                                    <a href="javascript:void(0)" class="fas fa-user"></a>
                                </div>
                             
                              <div  class="dropdown-content-login">
                                <a  href="{{ route('login') }} ">login</a>
                                <a  href="{{ route('register') }}">register</a>
                              </div>
                            </li>
                          </ul>
                        
                         @endif

   
 

  

</header>

<!-- header section ends -->

<!-- search form  -->

<div class="search-form">

    <div id="close-search" class="fas fa-times"></div>

    <form action="">
        <input type="search" name="" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        
    </form>
</div>