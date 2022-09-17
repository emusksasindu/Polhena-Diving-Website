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
 
<!-- Shopping Cart Section Begin -->
 <section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="images/shopping-cart/cart-1.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>scubaPro Fins Blue</h6>
                                        <h5>$100.00</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 100.00</td>
                                <td class="cart__close"><i class="fa fa-close"></i></td>
                            </tr>
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="images/shopping-cart/cart-2.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>Yamathekudasai BCD</h6>
                                        <h5>$200.00</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="2">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 400.00</td>
                                <td class="cart__close"><i class="fa fa-close"></i></td>
                            </tr>
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="images/shopping-cart/cart-3.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>Open Water Diver Course</h6>
                                        <h5>$375.00</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 375.00</td>
                                <td class="cart__close"><i class="fa fa-close"></i></td>
                            </tr>
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="images/shopping-cart/cart-4.jpg" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>ScubaPro Regulator</h6>
                                        <h5>$69.69</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ 69.69</td>
                                <td class="cart__close"><i class="fa fa-close"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="#">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            <p><br><br></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!--div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div-->
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ 6969.69</span></li>
                        <li>Total <span>$ 6969.69</span></li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

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