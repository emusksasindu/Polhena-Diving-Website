<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polhena Diving Center</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>
    
<!-- header section starts  -->

<header class="header">

<a href="#" class ="logo"> <img src='images\PDC Logo.png' alt="Image" height="60" width="251.76"> </a>

    <nav class="navbar">
        <div id="nav-close" class="fas fa-times"></div>
        <a href="home">home</a>
        <a href="#about">about</a>
        <a href="products">products</a>
        <a href="#packages">services</a>
        <a href="#reviews">reviews</a>
        <a href="#blogs">blogs</a>
        
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="#" class="fas fa-shopping-cart"></a>
        <div id="search-btn" class="fas fa-search"></div>
    </div>


 


      
    @if (Auth::check())
    <ul >
        <li class="dropdown">
            <div class="icons">
                <a id="account" href="javascript:void(0)">{{ Auth::user()->name }}</a>
            </div>
         
          <div class="dropdown-content">
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
                         <ul class="">
                            <li  class="dropdown loginList" >
                                <div class="icons">
                                    <a href="javascript:void(0)" class="fas fa-user"></a>
                                </div>
                             
                              <div  class="dropdown-content">
                                <a  href="login ">login</a>
                                <a  href="register">register</a>
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