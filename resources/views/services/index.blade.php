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


<!-- Shop Section Begin -->
 <section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                <li><a href="#">Dive Courses</a></li>
                                                <li><a href="#">Snorkeling</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Brands</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                <li><a href="#">Cressi</a></li>
                                                <li><a href="#">ScubaPro</a></li>
                                                <li><a href="#">Mares</a></li>
                                                <li><a href="#">AquaLung</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div-->
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="#">$0.00 - $50.00</a></li>
                                                <li><a href="#">$50.00 - $100.00</a></li>
                                                <li><a href="#">$100.00 - $150.00</a></li>
                                                <li><a href="#">$150.00 - $200.00</a></li>
                                                <li><a href="#">$200.00 - $250.00</a></li>
                                                <li><a href="#">250.00+</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                </div>
                                <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__size">
                                            <label for="xs">xs
                                                <input type="radio" id="xs">
                                            </label>
                                            <label for="sm">s
                                                <input type="radio" id="sm">
                                            </label>
                                            <label for="md">m
                                                <input type="radio" id="md">
                                            </label>
                                            <label for="xl">xl
                                                <input type="radio" id="xl">
                                            </label>
                                            <label for="2xl">2xl
                                                <input type="radio" id="2xl">
                                            </label>
                                            <label for="xxl">xxl
                                                <input type="radio" id="xxl">
                                            </label>
                                            <label for="3xl">3xl
                                                <input type="radio" id="3xl">
                                            </label>
                                            <label for="4xl">4xl
                                                <input type="radio" id="4xl">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div-->
                            <!--div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                </div>
                                <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__color">
                                            <label class="c-1" for="sp-1">
                                                <input type="radio" id="sp-1">
                                            </label>
                                            <label class="c-2" for="sp-2">
                                                <input type="radio" id="sp-2">
                                            </label>
                                            <label class="c-3" for="sp-3">
                                                <input type="radio" id="sp-3">
                                            </label>
                                            <label class="c-4" for="sp-4">
                                                <input type="radio" id="sp-4">
                                            </label>
                                            <label class="c-5" for="sp-5">
                                                <input type="radio" id="sp-5">
                                            </label>
                                            <label class="c-6" for="sp-6">
                                                <input type="radio" id="sp-6">
                                            </label>
                                            <label class="c-7" for="sp-7">
                                                <input type="radio" id="sp-7">
                                            </label>
                                            <label class="c-8" for="sp-8">
                                                <input type="radio" id="sp-8">
                                            </label>
                                            <label class="c-9" for="sp-9">
                                                <input type="radio" id="sp-9">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div-->
                            <!-- div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                </div>
                                <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__tags">
                                            <a href="#">Product</a>
                                            <a href="#">Bags</a>
                                            <a href="#">Shoes</a>
                                            <a href="#">Fashio</a>
                                            <a href="#">Clothing</a>
                                            <a href="#">Hats</a>
                                            <a href="#">Accessories</a>
                                        </div>
                                    </div>
                                </div>
                            </div-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 1–6 of 6 results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="">Low To High</option>
                                    <option value="">$0 - $55</option>
                                    <option value="">$55 - $100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('images/product/service-1.jpg')}}">
                                <!--ul class="product__hover">
                                    <li><a href="#"><img src="{{asset('images/icon/heart.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('images/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                    </li>
                                    <li><a href="#"><img src="{{asset('images/icon/search.png')}}" alt=""></a></li>
                                </ul-->
                            </div>
                            <div class="product__item__text">
                                <h6>PADI Open Water Course</h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>$375.00</h5>
                                <!--div class="product__color__select">
                                    <label for="pc-4">
                                        <input type="radio" id="pc-4">
                                    </label>
                                    <label class="active black" for="pc-5">
                                        <input type="radio" id="pc-5">
                                    </label>
                                    <label class="grey" for="pc-6">
                                        <input type="radio" id="pc-6">
                                    </label>
                                </div-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item sale">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('images/product/service-2.jpg')}}">
                                <span class="label">Sale</span>
                                <!--ul class="product__hover">
                                    <li><a href="#"><img src="{{asset('images/icon/heart.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('images/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                    </li>
                                    <li><a href="#"><img src="{{asset('images/icon/search.png')}}" alt=""></a></li>
                                </ul-->
                            </div>
                            <div class="product__item__text">
                                <h6>Padi Advanced Open Water Copurse</h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>$350.00</h5>
                                <!--div class="product__color__select">
                                    <label for="pc-7">
                                        <input type="radio" id="pc-7">
                                    </label>
                                    <label class="active black" for="pc-8">
                                        <input type="radio" id="pc-8">
                                    </label>
                                    <label class="grey" for="pc-9">
                                        <input type="radio" id="pc-9">
                                    </label>
                                </div-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('images/product/service-3.jpg')}}">
                                <!--ul class="product__hover">
                                    <li><a href="#"><img src="{{asset('images/icon/heart.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('images/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                    </li>
                                    <li><a href="#"><img src="{{asset('images/icon/search.png')}}" alt=""></a></li>
                                </ul-->
                            </div>
                            <div class="product__item__text">
                                <h6>PADI Rescue Diver Course</h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>$450.00</h5>
                                <!--div class="product__color__select">
                                    <label for="pc-10">
                                        <input type="radio" id="pc-10">
                                    </label>
                                    <label class="active black" for="pc-11">
                                        <input type="radio" id="pc-11">
                                    </label>
                                    <label class="grey" for="pc-12">
                                        <input type="radio" id="pc-12">
                                    </label>
                                </div-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item sale">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('images/product/service-4.jpg')}}">
                                <span class="label">Sale</span>
                                <!--ul class="product__hover">
                                    <li><a href="#"><img src="{{asset('images/icon/heart.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('images/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                    </li>
                                    <li><a href="#"><img src="{{asset('images/icon/search.png')}}" alt=""></a></li>
                                </ul-->
                            </div>
                            <div class="product__item__text">
                                <h6>PADI Divemaster Course</h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>$1800.00</h5>
                                <!--div class="product__color__select">
                                    <label for="pc-16">
                                        <input type="radio" id="pc-16">
                                    </label>
                                    <label class="active black" for="pc-17">
                                        <input type="radio" id="pc-17">
                                    </label>
                                    <label class="grey" for="pc-18">
                                        <input type="radio" id="pc-18">
                                    </label>
                                </div-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('images/product/service-5.jpg')}}">
                                <!--ul class="product__hover">
                                    <li><a href="#"><img src="{{asset('images/icon/heart.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('images/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                    </li>
                                    <li><a href="#"><img src="{{asset('images/icon/search.png')}}" alt=""></a></li>
                                </ul-->
                            </div>
                            <div class="product__item__text">
                                <h6>Day Snorkeling Package</h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>$18.00</h5>
                                <!--div class="product__color__select">
                                    <label for="pc-19">
                                        <input type="radio" id="pc-19">
                                    </label>
                                    <label class="active black" for="pc-20">
                                        <input type="radio" id="pc-20">
                                    </label>
                                    <label class="grey" for="pc-21">
                                        <input type="radio" id="pc-21">
                                    </label>
                                </div-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('images/product/service-6.jpg')}}">
                                <!--ul class="product__hover">
                                    <li><a href="#"><img src="{{asset('images/icon/heart.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('images/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                    </li>
                                    <li><a href="#"><img src="{{asset('images/icon/search.png')}}" alt=""></a></li>
                                </ul-->
                            </div>
                            <div class="product__item__text">
                                <h6>night Snorkeling</h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>$25.00</h5>
                                <!--div class="product__color__select">
                                    <label for="pc-22">
                                        <input type="radio" id="pc-22">
                                    </label>
                                    <label class="active black" for="pc-23">
                                        <input type="radio" id="pc-23">
                                    </label>
                                    <label class="grey" for="pc-24">
                                        <input type="radio" id="pc-24">
                                    </label>
                                </div-->
                            </div>
                        </div>
                    </div>
                   
                
            </div>
        </div>
    </div>
</section>


<!-- Shop Section End -->

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