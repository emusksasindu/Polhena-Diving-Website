<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Service Form - Laravel 9 CRUD Tutorial</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Service</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('products.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="product name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Description:</strong>
    <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="product description">
    @error('description')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Qty:</strong>
        <input type="text" name="qty" value="{{ $product->qty }}" class="form-control" placeholder="product qty">
        @error('qty')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
        </div>
        </div>

        <!--div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Size:</strong>
            <input type="text" name="size" value="{{ $product->size }}" class="form-control" placeholder="product size">
            @error('size')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Color:</strong>
                <input type="text" name="color" value="{{ $product->color }}" class="form-control" placeholder="product color">
                @error('color')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                </div>
                </div-->

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" value="{{ $product->status }}" class="form-control" placeholder="product status">
                    @error('status')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                        <strong>Price:</strong>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="product price">
                        @error('price')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        </div>
                        </div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</div>
</body>
</html>