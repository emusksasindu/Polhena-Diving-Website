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
  <!-- Shop Details Section Begin -->
  <div class="gap"></div>
  <section class="shop-details ">
    <div class="product__details__pic">
        <div class="container ">
          
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="/storage/{{$product->image_1}}">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="/storage/{{$product->image_2}}">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="/storage/{{$product->image_3}}">
                                </div>
                            </a>
                        </li>
                       
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane " id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src='/storage/{{$product->image_1}}' alt="">
                            </div>
                        </div>
                        <div class="tab-pane active" id="tabs-2" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src='/storage/{{$product->image_2}}' alt="">
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src='/storage/{{$product->image_3}}' alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>{{$product->name}}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div>
                        
                        <h4 class="mt-4">{{$product->discount}}% Discount!</h4>
                        <h3>${{$product->selling_price}}/= <span>${{$product->selling_price * 100 /(100 - $product->discount)}}/=</span></h3>
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                
                                @if($product->xxl_qty > 0)
                                @error('xxl_qty')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <form action="{{ route('cart.create') }}" method="POST">
                                @csrf
                                <div class="product__details__cart__option">
                                    <div class="quantity">
                                        <h5>XXL:</h5>
                                        <div class="pro-qty">
                                            <input name="product_id" type="hidden" value="{{$product->id}}">
                                            <input name="size" type="hidden" value="xxl">
                                            <input name="max_qty" type="hidden" value="{{$product->xxl_qty}}">
                                            <input id= 'input_qty' name="xxl_qty" type="text" value="0">
                                        </div>
                                        
                                    </div>
                                    <button  class="primary-btn">add to cart</button>
                                    <div class="row">
                                        <h5 class= 'font-weight-bold'>Maximum Quantity : {{$product->xxl_qty}}</h5>
                                    </div>
                                </div>
                                </form>
                                @endif

                                @if($product->xl_qty > 0)
                                @error('xl_qty')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <form action="{{ route('cart.create') }}" method="POST">
                                @csrf
                                <div class="product__details__cart__option">
                                    <div class="quantity">
                                        <h5>XL</h5>
                                        <div class="pro-qty">
                                            <input name="product_id" type="hidden" value="{{$product->id}}">
                                            <input name="max_qty" type="hidden" value="{{$product->xl_qty}}">
                                            <input name="size" type="hidden" value="xl">
                                            <input id= 'input_qty' name="xl_qty" type="text" value="0">
                                        </div>
                                    </div>
                                    <button  class="primary-btn">add to cart</button>
                                    <div class="row">
                                        <h5 class= 'font-weight-bold'>Maximum Quantity : {{$product->xl_qty}}</h5>
                                    </div>
                                </div>
                                </form>
                                @endif

                                @if($product->large_qty > 0)
                                @error('large_qty')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <form action="{{ route('cart.create') }}" method="POST">
                                @csrf
                                <div class="product__details__cart__option">
                                    <div class="quantity">
                                        <h5>LARGE</h5>
                                        <div class="pro-qty">
                                            <input name="product_id" type="hidden" value="{{$product->id}}">
                                            <input name="max_qty" type="hidden" value="{{$product->large_qty}}">
                                            <input name="size" type="hidden" value="large">
                                            <input id= 'input_qty' name="large_qty" type="text" value="0">
                                        </div>
                                    </div>
                                    <button  class="primary-btn">add to cart</button>
                                    <div class="row">
                                        <h5 class= 'font-weight-bold'>Maximum Quantity : {{$product->large_qty}}</h5>
                                    </div>
                                </div>
                                </form>
                                @endif

                                @if($product->medium_qty > 0)
                                @error('medium_qty')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <form action="{{ route('cart.create') }}" method="POST">
                                    @csrf
                                <div class="product__details__cart__option">
                                    <div class="quantity">
                                        <h5>MEDIUM</h5>
                                        <div class="pro-qty">
                                            <input name="product_id" type="hidden" value="{{$product->id}}">
                                            <input name="size" type="hidden" value="medium">
                                            <input name="max_qty" type="hidden" value="{{$product->medium_qty}}">
                                            <input id= 'input_qty' name="medium_qty" type="text" value="0">
                                        </div>
                                    </div>
                                    <button  class="primary-btn">add to cart</button>
                                    <div class="row">
                                        <h5 class= 'font-weight-bold'>Maximum Quantity : {{$product->medium_qty}}</h5>
                                    </div>
                                </div>
                                </form>
                                @endif

                                @if($product->small_qty > 0)
                                @error('small_qty')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                <form action="{{ route('cart.create') }}" method="POST">
                                    @csrf
                                <div class="product__details__cart__option">
                                    <div class="quantity">
                                        <h5>SMALL</h5>
                                        <div class="pro-qty">
                                            <input name="product_id" type="hidden" value="{{$product->id}}">
                                            <input name="size" type="hidden" value="small">
                                            <input name="max_qty" type="hidden" value="{{$product->small_qty}}">
                                            <input id= 'input_qty' name="small_qty" type="text" value="0">
                                        </div>
                                    </div>
                                    <button  class="primary-btn">add to cart</button>
                                    <div class="row">
                                        <h5 class= 'font-weight-bold'>Maximum Quantity : {{$product->small_qty}}</h5>
                                    </div>
                                </div>
                              </form>
                                @endif

                            </div>
                            
                        </div>
                        
                        <div class="product__details__last__option">
                            <h5><span>Guaranteed Safe Checkout</span></h5>
                            <img src="{{asset('images/shop-details/details-payment.png')}}" alt="">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                role="tab">Description</a>
                            </li>
                          
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                   <p>{{$product->description}}</p>
                                </div>
                            </div>
                           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->

<!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            @foreach($products as $relatedProduct)
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6"> 
                <div class="product__item {{$product->discount > 0? 'sale': ''}}">
                    <div class="product__item__pic set-bg" data-setbg="/storage/{{$relatedProduct->image_1}}">
                        @if($product->discount > 0)
                        <span class="label">{{$product->discount}}% off</span>
                     @endif   
                    </div>
                    <div class="product__item__text">
                        <h6>{{$relatedProduct->name}}</h6>
                        @if ($product->status == 'in stock')
                                <a href="{{ route('products.show',$relatedProduct) }}" class="add-cart text-primary">+ Add To Cart</a>
                                @else
                                <a  class="add-cart ">Out of stock</a>
                                @endif
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        @if($relatedProduct->discount > 0)
                                <h5 class = "text-muted font-weight-light"><span>${{$relatedProduct->selling_price * 100 / (100 - $relatedProduct->discount)}}</span></h5>
                        @endif
                                <h4 class = "text-light bg-dark font-weight-bold">${{$relatedProduct->selling_price}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Section End -->

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