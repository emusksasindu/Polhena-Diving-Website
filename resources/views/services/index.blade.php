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
                        <form action="{{ route('services.search') }}" method="POST">
                            @csrf
                            <input name='keyword' type="text" placeholder="Search...">
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
                                                <li><a href="{{ route('services.index') }}">All</a></li>
                                                @foreach($categories as $category)
                                                <li><a class='{{session()->get('category_id') == $category->id ? 'bold':''}}'href="{{ route('services.filter',['id' => $category->id, 'min_price' => session()->get('min_price'),'max_price' => session()->get('max_price')]) }}">{{$category->name}}</a></li>
                                                @endforeach
                                                @csrf
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a  href="{{ route('services.index') }}">All</a></li>
                                                <li><a class='{{session()->get('min_price') == 0 ? 'bold':''}}' href="{{ route('services.filter',['id' => session()->get('category_id'), 'min_price' => 0,'max_price' => 50]) }}">$0.00 - $50.00</a></li>
                                                <li><a class='{{session()->get('min_price') == 50 ? 'bold':''}}' href="{{ route('services.filter',['id' => session()->get('category_id'), 'min_price' => 50,'max_price' => 100]) }}">$50.00 - $100.00</a></li>
                                                <li><a class='{{session()->get('min_price') == 100 ? 'bold':''}}' href="{{ route('services.filter',['id' => session()->get('category_id'), 'min_price' => 100,'max_price' => 150]) }}">$100.00 - $150.00</a></li>
                                                <li><a class='{{session()->get('min_price') == 150 ? 'bold':''}}' href="{{ route('services.filter',['id' => session()->get('category_id'), 'min_price' => 150,'max_price' => 200]) }}">$150.00 - $200.00</a></li>
                                                <li><a class='{{session()->get('min_price') == 200 ? 'bold':''}}' href="{{ route('services.filter',['id' => session()->get('category_id'), 'min_price' => 200,'max_price' => 250]) }}">$200.00 - $250.00</a></li>
                                                <li><a class='{{session()->get('min_price') == 250 ? 'bold':''}}' href="{{ route('services.filter',['id' => session()->get('category_id'), 'min_price' => 250,'max_price' => 99999999999]) }}">250.00+</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                               @if(count($services) != 0)
                               
                                    <p>Showing {{($services->currentpage()-1)*$services->perpage()+1}} to 
                                        {{$services->currentpage()*$services->perpage() < $services->total() ? 
                                        $services->currentpage()*$services->perpage():
                                        $services->total();
                                        }} of 
                                        {{$services->total()}} results
                                    </p>

                               
                               @else
                               
                                <p>No Results
                                </p>

                               
                               @endif
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <!--div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="">Low To High</option>
                                    <option value="">$0 - $55</option>
                                    <option value="">$55 - $100</option>
                                </select>
                            </div-->
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item {{$service->discount > 0? 'sale': ''}}">
                            <div class="product__item__pic set-bg" data-setbg="/storage/{{$service->imageUrl_1}}">
                               @if($service->discount > 0)
                                  <span class="label">{{$service->discount}}% off</span>
                               @endif
                                <!--ul class="product__hover">
                                    <li><a href="#"><img src="{{asset('images/icon/heart.png')}}" alt=""></a></li>
                                    <li><a href="#"><img src="{{asset('images/icon/compare.png')}}" alt=""> <span>Compare</span></a>
                                    </li>
                                    <li><a href="#"><img src="{{asset('images/icon/search.png')}}" alt=""></a></li>
                                </ul-->
                            </div>
                            <div class="product__item__text">
                                <h6>{{$service->name}}</h6>
                                @if ($service->status == 'in stock')
                                <a href="{{ route('services.show',$service) }}" class="add-cart text-primary">+ Add To Cart</a>
                                @else
                                <a  class="add-cart ">Out of stock</a>
                                @endif
                            
                                @if($service->discount > 0)
                                <h5 class = "text-muted font-weight-light"><span>${{round($service->selling_price *100 / (100 - $service->discount),2)}}</span></h5>
                                @endif
                                <h4 class = "text-light bg-dark font-weight-bold">${{$service->selling_price}}</h4>
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
                   @endforeach

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center">
                            {!! $services->links() !!}
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