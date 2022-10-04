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
<div class="gap"></div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
 <section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($services as $service)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="/storage/{{$service->imageUrl_1}}" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{$service->name}}</h6>
                                        <h5>{{$service->selling_price}}</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="product__cart__item__text">
                                            <h6>{{$service->pivot->size}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="product__cart__item__text">
                                            <h6>{{$service->pivot->qty}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">${{$service->selling_price * $service->pivot->qty}}</td>
                                <td class="cart__close"><a href="{{route('cart.deleteItem',['id'=>$service->id,'size'=>$service->pivot->size,'qty'=>$service->pivot->qty,'discount'=>0,'selling_price'=>$service->selling_price,'type'=>'service'])}}"><i class="fa fa-close"></a></i></td>
                            </tr>
                            @endforeach
                          
                           @foreach ($products as $product)
                           <tr>
                               <td class="product__cart__item">
                                   <div class="product__cart__item__pic">
                                       <img src="/storage/{{$product->image_1}}" alt="">
                                   </div>
                                   <div class="product__cart__item__text">
                                       <h6>{{$product->name}}</h6>
                                       <h5>{{$product->selling_price}}</h5>
                                   </div>
                               </td>
                               <td class="quantity__item">
                                   <div class="quantity">
                                       <div class="product__cart__item__text">
                                           <h6>{{$product->pivot->size}}</h6>
                                       </div>
                                   </div>
                               </td>
                               <td class="quantity__item">
                                   <div class="quantity">
                                       <div class="product__cart__item__text">
                                           <h6>{{$product->pivot->qty}}</h6>
                                       </div>
                                   </div>
                               </td>
                               <td class="cart__price">${{$product->selling_price * $product->pivot->qty}}</td>
                               <td class="cart__close"><a href="{{route('cart.deleteItem',['id'=>$product->id,'size'=>$product->pivot->size,'qty'=>$product->pivot->qty,'discount'=>$product->discount,'selling_price'=>$product->selling_price,'type'=>'product'])}}"><i class="fa fa-close"></a></i></td>
                           </tr>
                             @endforeach
                           
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="/products">Continue Shopping</a>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4">
               
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>${{round($cart->sub_total,2)}}</span></li>
                        <li>Discount <span>${{round($cart->discount,2)}}</span></li>
                        <li>Total <span>${{round($cart->total,2)}}</span></li>
                    </ul>
                    <a href="{{route('orders.create')}}" class="primary-btn">Proceed to checkout</a>
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