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
                                <div class="product__thumb__pic set-bg" data-setbg="/storage/{{$service->imageUrl_1}}">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="/storage/{{$service->imageUrl_2}}">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="/storage/{{$service->imageUrl_3}}">
                                </div>
                            </a>
                        </li>
                       
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane " id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src='/storage/{{$service->imageUrl_1}}' alt="">
                            </div>
                        </div>
                        <div class="tab-pane active" id="tabs-2" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src='/storage/{{$service->imageUrl_2}}' alt="">
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src='/storage/{{$service->imageUrl_3}}' alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('cartCreated'))
<div class="alert alert-success mb-1 mt-1">
    {{ session('cartCreated') }}
</div>
@endif
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>{{$service->name}}</h4>
                        <h5>Service ID : {{$service->serviceID}}</h5>
                        <h5 class="pt-2">Category : {{$service->category}}</h5>
                        
                        
                        <h3>${{$service->selling_price}}/= </h3>
                        <div class="product__details__option">
                            <div class="product__details__option__size">
                                
                                
                                <form action="{{ route('cart.create') }}" method="POST">
                                    @csrf
                                <div class="product__details__cart__option">
                                    @error('qty')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    <div class="quantity">
                                       
                                        <h5>QTY</h5>
                                        <div class="pro-qty">
                                            <input name="type" type="hidden" value="service">
                                            <input name="item_id" type="hidden" value="{{$service->id}}">
                                            <input id= 'input_qty' name="qty" type="text" value="1">
                                        </div>
                                    </div>
                                    <button  class="primary-btn">add to cart</button>
                                </div>
                              </form>
                              

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
                                   <p>{{$service->description}}</p>
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
                <h3 class="related-title">Related Services</h3>
            </div>
        </div>
        <div class="row">
            @foreach($services as $relatedProduct)
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6"> 
                <div class="product__item {{$service->discount > 0? 'sale': ''}}">
                    <div class="product__item__pic set-bg" data-setbg="/storage/{{$relatedProduct->imageUrl_1}}">
                        @if($service->discount > 0)
                        <span class="label">{{$service->discount}}% off</span>
                     @endif   
                    </div>
                    <div class="product__item__text">
                        <h6>{{$relatedProduct->name}}</h6>
                        @if ($service->status == 'in stock')
                                <a href="{{ route('services.show',$relatedProduct) }}" class="add-cart text-primary">+ Add To Cart</a>
                                @else
                                <a  class="add-cart ">Out of stock</a>
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