@include('layouts.header')


<!-- Css Styles -->
<link rel="stylesheet" href="{{ asset('css/product/bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/product/elegant-icons.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/product/font-awesome.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/product/magnific-popup.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/product/nice-select.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/product/owl.carousel.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/product/slicknav.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/product/style.css') }}" type="text/css">

 <!-- Checkout Section Begin -->
 <section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="#">
                <div class="row pt-4">
                    <div class="col-lg-8 col-md-6">
                       
                        <h6 class="checkout__title">Payment Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Card Number<span>*</span></p>
                                    <input name="card_number" placeholder="enter the card number" type="text">
                                </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Expiration Month<span>*</span></p>
                                    <input placeholder="MM" type="text">
                                </div>
                                <div class="checkout__input">
                                    <p>Expiration Year<span>*</span></p>
                                    <input placeholder="YY" type="text">
                                </div>
                            </div>
                           
                        </div>

                      <div class="row">
                        <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>CVV<span>*</span></p>
                            <input type="text" name="address" placeholder="enter the 4 digits CVV Number" class="checkout__input__add">
                        </div>
                      </div>
                      </div>
                    
                        
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                <li>01. ScubaPro SeaWing Fins <span>$ 300.0</span></li>
                                <li>02. aquaLung BCD <span>$ 170.0</span></li>
                                <li>03. ScubaPro Wetsuit <span>$ 170.0</span></li>
                                <li>04. scubaPro Mask <span>$ 110.0</span></li>
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>$750.99</span></li>
                                <li>Discount <span>$750.99</span></li>
                                <li>Total <span>$750.99</span></li>
                            </ul>
                           
                           
                            <button type="submit" class="site-btn">Pay Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

 <!-- Js Plugins -->
 <script src="{{asset('js/product/jquery-3.3.1.min.js')}}"></script>
 <script src="{{asset('js/product/bootstrap.min.js')}}"></script>
 <script src="{{asset('js/product/jquery.nice-select.min.js')}}"></script>
 <script src="{{asset('js/product/jquery.nicescroll.min.js')}}"></script>
 <script src="{{asset('js/product/jquery.magnific-popup.min.js')}}"></script>
 <script src="{{asset('js/product/jquery.countdown.min.js')}}"></script>
 <script src="{{asset('js/product/jquery.slicknav.js')}}"></script>
 <script src="{{asset('js/product/mixitup.min.js')}}"></script>
 <script src="{{asset('js/product/owl.carousel.min.js')}}"></script>
 <script src="{{asset('js/product/main.js')}}"></script>
@include('layouts.footer')