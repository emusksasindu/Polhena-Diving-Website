@include('layouts.header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<!-- header section  -->

<section class="heading">
    <h1>our products</h1>
    <p> <a href="home">home</a> >> products </p>
</section>

<!-- header section -->

<!-- prodcuts section starts  -->

<section class="products">

    <h1 class="title"> featured products </h1>

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

<a class="btn btn-success"  href="{{ route('products.create') }}"> Create product</a>
    <div class="box-container">


        @foreach ($products as $product)

        <div class="box">
            <div class="image">
                <div class="icons">
                    <a href="#" class="fas fa-shopping-cart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>                
                <img src="images/product-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>{{ $product->id }}</h3>
                <h3>{{ $product->name }}</h3>
                <h3>{{ $product->description }}</h3>
                <h3>{{ $product->qty }}</h3>
                <h3>{{ $product->size }}</h3>
                <h3>{{ $product->color }}</h3>
                <h3>{{ $product->status }}</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price">{{ $product->price }}<span>{{ $product->price + 5 }}</span></div>
            </div>
            <form action="{{ route('products.destroy',$product->id) }}" method="Post">
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        </div>
        

        @endforeach


    </div>
    
</section>

<!-- prodcuts section ends -->






@include('layouts.footer')