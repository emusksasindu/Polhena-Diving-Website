@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

<!-- HOME section starts  -->

<section class="home" id="home">

    <div class="swiper home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="box" style="background: url(images/home-bg-1.jpg) no-repeat;">
                    <div class="content">
                        <span>never stop</span>
                        <h3>exploring</h3>
                        <p>Sri Lanka has some of the best scuba diving spots in South Asia. Pristine beaches, warm
                            water, going underwater is certainly a treat in here!</p>
                        <a href="{{ asset('/services') }}" class="btnHome">get started</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box second" style="background: url(images/home-bg-2.jpg) no-repeat;">
                    <div class="content">
                        <span>make your dive trip</span>
                        <h3>amazing</h3>
                        <p>The dive shop which remembers your name and know the size of your fins. A place to find
                            friends, and a place to find your soul.</p>
                        <a href="{{ asset('/services') }}" class="btnHome">get started</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box" style="background: url(images/home-bg-3.jpg) no-repeat;">
                    <div class="content">
                        <span>explore a</span>
                        <h3>new underwater world</h3>
                        <p>Discover the depths of Southern Sea, From Weligama, Mirissa and all the way to Tangalle.
                            Including the famous Moray Point minutes away from the polhena diving center.</p>
                        <a href="{{ asset('/services') }}" class="btnHome">get started</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- HOME section ends -->

<!-- LATEST PRODUCTS section starts  -->

<section class="shop" id="shop">

    <h1 class="heading">LATEST PRODUCTS
    </h1>

    <div class="swiper product-slider">
        @if ($productCount != 0)
            <div class="swiper-wrapper">
                @foreach ($products as $product)
                    <div class="swiper-slide slide">
                        <div class="image">
                            <img src="/storage/{{ $product->image_1 }}" alt="">
                            <div class="icons">
                                <a href="{{ route('products.show', $product) }}" class="fas fa-shopping-cart"></a>

                            </div>
                        </div>
                        <div class="content">
                            <h3>{{ $product->name }}</h3>
                            <div class="price">${{ $product->selling_price }} </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <p class="heading">No Products</p>
        @endif
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- LATEST PRODUCTS section ends -->

<!-- LATEST SERVICES section starts  -->

<section class="packages" id="packages">

    <h1 class="heading">LATEST SERVICES & PACKAGES
    </h1>

    <div class="box-container">
        @if ($serviceCount != 0)
            @foreach ($services as $service)
                <div class="box">
                    <div class="image">
                        <img src="storage/{{ $service->imageUrl_1 }}" alt="">
                    </div>
                    <div class="content">
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->description }}</p>
                        <div class="price">${{ $service->selling_price }}</div>
                        <a href="#" class="btn">explore now</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</section>

<!-- LATEST SERVICES section ends -->

<!-- GALLERY section starts -->


<section class="gallery" id="gallery">

    <h1 class="heading">GALLERY</h1>

    <div class="swiper-container gallery-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/slide-1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-2.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-3.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-4.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-5.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/slide-6.jpg" alt=""></div>
        </div>
    </div>

</section>


<!-- GALLERY section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

    <h1 class="heading">client's reviews</h1>

    <div class="swiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <p class="text">I recommend the professional Polhena Diving Center. It is a great place if you want to
                    do some diving at the South coast!</p>
                <div class="user">
                    <img src="images/pic-1.png" alt="">
                    <div class="info">
                        <h3>John Deo</h3>
                        <span>designer</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Perfect first diving experience in Sri Lanka! Lovely staff, with an amazing smile all
                    the time even though there are tough times in Sri Lanka at the moment!</p>
                <div class="user">
                    <img src="images/pic-2.png" alt="">
                    <div class="info">
                        <h3>Jessica Fritz</h3>
                        <span>Model</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Very nice diving centre with a great team. Had a super time not only under water, but
                    also on the surface, having fun and making jokes.</p>
                <div class="user">
                    <img src="images/pic-3.png" alt="">
                    <div class="info">
                        <h3>Jesse James</h3>
                        <span>Divemaster</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Had some amazing fundives. Really professional and family run team. Definitely
                    recommend!</p>
                <div class="user">
                    <img src="images/pic-4.png" alt="">
                    <div class="info">
                        <h3>Allie Kent</h3>
                        <span>Influencer</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Great place if you want to do some diving at the South coast. Chamli, Randu, Keshan,
                    Nandu and everyone else will give you a great diving experience and some nice tea afterwards. </p>
                <div class="user">
                    <img src="images/pic-5.png" alt="">
                    <div class="info">
                        <h3>Derek Anthony</h3>
                        <span>Professional Skier</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">The snorkelling with turtles was amazing! We found a baby turtle (we named it Toby)
                    that kept swimming right up to us. </p>
                <div class="user">
                    <img src="images/pic-6.png" alt="">
                    <div class="info">
                        <h3>Natalie Cabello</h3>
                        <span>Racer</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- reviews section ends -->


<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> our daily posts </h1>

    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">
          @foreach ( $posts as $post)
          <div class="swiper-slide slide">
            <img src="/storage/{{$post->imageUrl}}" alt="">
            <div class="icons">
                <a href="#"> <i class="fas fa-calendar"></i>{{date('Y-m-d', strtotime($post->created_at))}}</a>
                <a href="#"> <i class="fas fa-user"></i>{{$post->user->name}}</a>
            </div>
            <h3>{{$post->title}}</h3>
            <p>{{$post->body}}</p>
            <a href="{{route('posts.show',$post)}}" class="btn">read more</a>
        </div>
          @endforeach
           
        </div>

    </div>

</section>

<!-- blogs section ends -->

<!-- CONTACT US section  -->

<section class="newsletter">

    <div class="content">
        <h1 class="heading">CONTACT US</h1>
        <p>We always reply unless someone threw our Admin team in the water.</p>
        @if(count($errors) > 0 )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                Please Fill All Required Fields.!
            </div>
        @endif
        @if(session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}
                </strong>
        </div>
        @endif
        <form action="/subscribed" method="POST">
            {{ csrf_field() }}
            <input type="text" name="name" placeholder="enter your name" id="" class="email">
            <input type="email" name="email" placeholder="enter your email" id="" class="email">
            <input type="tel" name="number" placeholder="enter your number" id="" class="email">
            <input type="text" name="subject" placeholder="enter the subject" id="" class="email">
            <textarea cols="40" rows="5" type="text" name="body" placeholder="enter your message" id="" class="subject"></textarea>
            <input type="submit" value="Send" class="btn">
        </form>
    </div>
    <div class="content">
        <h1 class="heading">FIND US HERE</h1>
        <iframe src= "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15873.689475139015!2d80.5175042!3d5.9363725!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x71712a6aec5f4d6c!2sPolhena%20Diving%20Center!5e0!3m2!1sen!2slk!4v1660281737106!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>

</section>



<x-user_chat_window/>
@include('layouts.footer')
