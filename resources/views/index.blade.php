@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<!-- HOME section starts  -->

<section class="home" id="home">

    <div class="swiper home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="box" style="background: url(images/home-bg-1.jpg) no-repeat;">
                    <div class="content">
                        <span>never stop</span>
                        <h3>exploring</h3>
                        <p>Sri Lanka has some of the best scuba diving spots in South Asia. Pristine beaches, warm water, going underwater is certainly a treat in here!</p>
                        <a href="#" class="btnHome">get started</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box second" style="background: url(images/home-bg-2.jpg) no-repeat;">
                    <div class="content">
                        <span>make your dive trip</span>
                        <h3>amazing</h3>
                        <p>The dive shop which remembers your name and know the size of your fins. A place to find friends, and a place to find your soul.</p>
                        <a href="#" class="btnHome">get started</a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="box" style="background: url(images/home-bg-3.jpg) no-repeat;">
                    <div class="content">
                        <span>explore a</span>
                        <h3>new underwater world</h3>
                        <p>Discover the depths of Southern Sea, From Weligama, Mirissa and all the way to Tangalle. Including the famous Moray Point minutes away from the polhena diving center.</p>
                        <a href="#" class="btnHome">get started</a>
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
      @if($productCount != 0)
        <div class="swiper-wrapper">
            @foreach ($products as $product)

            <div class="swiper-slide slide">
                <div class="image">
                    <img src="/storage/{{$product->image_1}}" alt="">
                    <div class="icons">
                        <a href="{{ route('products.show',$product) }}" class="fas fa-shopping-cart"></a>
                        
                    </div>
                </div>
                <div class="content">
                    <h3>{{$product->name}}</h3>
                    <div class="price">${{$product->selling_price}} </div>
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

        <div class="box">
            <div class="image">
                <img src="images/img-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>PADI Open Water Course</h3>
                <p>Open Water Scuba Diver Course is the most famous entry level certification course out there.</p>
                <div class="price">$375 - $460</div>
                <a href="#" class="btn">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-2.jpg" alt="">
            </div>
            <div class="content">
                <h3>PADI Advanced Open Water Course</h3>
                <p>This course can be taken after completing the PADI Open Water Diver certification.</p>
                <div class="price">$330 - $405</div>
                <a href="#" class="btn">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-3.jpg" alt="">
            </div>
            <div class="content">
                <h3>PADI Rescue Diver Course</h3>
                <p>This is one of the most challenging yet rewarding courses in PADI recreational scuba diving certification lineup.</p>
                <div class="price">$405 - $430</div>
                <a href="#" class="btn">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-4.jpg" alt="">
            </div>
            <div class="content">
                <h3>PADI Divemaster</h3>
                <p>The PADI Divemaster course is your first level of professional training.</p>
                <div class="price">$1395 - $2500</div>
                <a href="#" class="btn">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-5.jpg" alt="">
            </div>
            <div class="content">
                <h3>Day Snorkeling Package</h3>
                <p>Snorkeling in Polhena is a famous activity because of the turtles in the bay.</p>
                <div class="price">$18 - $25</div>
                <a href="#" class="btn">explore now</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/img-6.jpg" alt="">
            </div>
            <div class="content">
                <h3>Night Snorkeling Package</h3>
                <p>Night snorkeling can be a great experience as most of the marine life comes alive at night and it is full of surprises!</p>
                <div class="price">$28 - $45</div>
                <a href="#" class="btn">explore now</a>
            </div>
        </div>

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
                <p class="text">I recommend the professional Polhena Diving Center. It is a great place if you want to do some diving at the South coast!</p>
                <div class="user">
                    <img src="images/pic-1.png" alt="">
                    <div class="info">
                        <h3>John Deo</h3>
                        <span>designer</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Perfect first diving experience in Sri Lanka! Lovely staff, with an amazing smile all the time even though there are tough times in Sri Lanka at the moment!</p>
                <div class="user">
                    <img src="images/pic-2.png" alt="">
                    <div class="info">
                        <h3>Jessica Fritz</h3>
                        <span>Model</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Very nice diving centre with a great team. Had a super time not only under water, but also on the surface, having fun and making jokes.</p>
                <div class="user">
                    <img src="images/pic-3.png" alt="">
                    <div class="info">
                        <h3>Jesse James</h3>
                        <span>Divemaster</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Had some amazing fundives. Really professional and family run team. Definitely recommend!</p>
                <div class="user">
                    <img src="images/pic-4.png" alt="">
                    <div class="info">
                        <h3>Allie Kent</h3>
                        <span>Influencer</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">Great place if you want to do some diving at the South coast. Chamli, Randu, Keshan, Nandu and everyone else will give you a great diving experience and some nice tea afterwards. </p>
                <div class="user">
                    <img src="images/pic-5.png" alt="">
                    <div class="info">
                        <h3>Derek Anthony</h3>
                        <span>Professional Skier</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide">
                <p class="text">The snorkelling with turtles was amazing! We found a baby turtle (we named it Toby) that kept swimming right up to us. </p>
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

            <div class="swiper-slide slide">
                <img src="images/img-1.jpg" alt="">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>Become an open water diver</h3>
                <p>How to become a PADI open water scuba diver? Learn more here.</p>
                <a href="/blog" class="btn">read more</a>
            </div>

            <div class="swiper-slide slide">
                <img src="images/img-2.jpg" alt="">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>upgrade your diver skills</h3>
                <p>Upgrade your certification with PADI advanced open water course</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="swiper-slide slide">
                <img src="images/img-3.jpg" alt="">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>Becoming a rescue diver</h3>
                <p>Click here to read about why it is good to have your rescue certification.</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="swiper-slide slide">
                <img src="images/img-4.jpg" alt="">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>Get a life, Go Pro</h3>
                <p>PADI Divemaster program is the first step to become a pro. Find out how.</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="swiper-slide slide">
                <img src="images/img-5.jpg" alt="">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>Did you know about the turtles in Madiha?<h3>
                <p>Madiha and Polhena is home to many green turtles.Curious to read more?</p>
                <a href="#" class="btn">read more</a>
            </div>

            <div class="swiper-slide slide">
                <img src="images/img-6.jpg" alt="">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21st may, 2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> by admin </a>
                </div>
                <h3>Whats great about night snorkeling?</h3>
                <p>Night snorkeling is not something that you get to do everyday.Find out more.</p>
                <a href="#" class="btn">read more</a>
            </div>

        </div>

    </div>

</section>

<!-- blogs section ends -->

<!-- newsletter section  -->

<section class="newsletter">

    <div class="content">
        <h1 class="heading">CONTACT US</h1>
        <p>We always reply unless someone threw our Admin team in the water.</p>
        <form action="">
            <input type="text" name="" placeholder="enter your name" id="" class="email">
            <input type="email" name="" placeholder="enter your email" id="" class="email">
            <input type="tel" name="" placeholder="enter your number" id="" class="email">
            <input type="text" name="" placeholder="enter the subject" id="" class="email">
            <textarea cols="40" rows="5" type="text" name="" placeholder="enter your message" id="" class="subject"></textarea>
            <input type="submit" value="subscribe" class="btn">
        </form>
    </div>
    <div class="content">
        <h1 class="heading">FIND US HERE</h1>
        <iframe src= "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15873.689475139015!2d80.5175042!3d5.9363725!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x71712a6aec5f4d6c!2sPolhena%20Diving%20Center!5e0!3m2!1sen!2slk!4v1660281737106!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    
    </div>
   
</section>


@include('layouts.footer')