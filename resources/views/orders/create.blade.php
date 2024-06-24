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
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="row pt-4">
                    <div class="col-lg-8 col-md-6">

                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Full Name<span>*</span></p>
                                    <input name="receiver_name" placeholder="enter the name of receiver" type="text">
                                    @error('receiver_name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Country<span>*</span></p>
                                    <input name="country" placeholder="enter the country of receiver" type="text">
                                    @error('country')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" name="shipping_address" placeholder="enter the Address"
                                        class="checkout__input__add">
                                    @error('shipping_address')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input name="number" placeholder="enter the number" type="text">
                                    @error('number')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input name="email" placeholder="enter the reciver email" type="email">
                                    @error('email')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Item <span>Total</span></div>
                            <ul class="checkout__total__products">
                                @foreach ($services as $service)
                                    <li>{{ substr($service->name, 0, 25) }}
                                        <span>${{ $service->selling_price * $service->pivot->qty }}</span>
                                    </li>
                                @endforeach

                                @foreach ($products as $product)
                                    <li>{{ substr($product->name, 0, 25) }}
                                        <span>${{ $product->selling_price * $product->pivot->qty }}</span>
                                    </li>
                                @endforeach

                            </ul>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>${{ $cart->sub_total }}</span></li>
                                <li>Discount <span>${{ $cart->discount }}</span></li>
                                <li>Total <span>${{ $cart->total }}</span></li>
                            </ul>


                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<!-- Js Plugins -->
<script src="{{ asset('js/product/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/product/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/product/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/product/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('js/product/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/product/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/product/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/product/mixitup.min.js') }}"></script>
<script src="{{ asset('js/product/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/product/main.js') }}"></script>
@include('layouts.footer')
