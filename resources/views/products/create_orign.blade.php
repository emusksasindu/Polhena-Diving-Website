
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Product Form - Laravel 9 CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Product</h2>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
</div>
</div>
</div>

<form action="{{ url('products.index') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" class="form-control" placeholder="Product Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
<div class="dropdown">
    <strong>Category :</strong>
        <select  class="btn btn-secondary" name="category">
            <option value="Men">Men</option>
            <option value="Women">Women</option>
            <option value="Kids">Kids</option>
        </select>
    @error('category')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description:</strong>
<input type="text" name="description" class="form-control" placeholder="Product description">
@error('description')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>qty:</strong>
<input type="number" name="qty" class="form-control" placeholder="Product qty">
@error('qty')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
<div class="dropdown">
    <strong>Size :</strong>
        <select  class="btn btn-secondary" name="size">
            <option value="Small">Small</option>
            <option value="Medium">Medium</option>
            <option value="Large">Large</option>
        </select>
    @error('size')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
<div class="dropdown">
    <strong>Color : </strong>
        <select  class="btn btn-secondary" name="color">
            <option value="black">black</option>
            <option value="white">white</option>
            <option value="red">red</option>
            <option value="green">green</option>
            <option value="yellow">yellow</option>
            <option value="blue">blue</option>
            <option value="pink">pink</option>
            <option value="gray">gray</option>
            <option value="brown">brown</option>
            <option value="orange">orange</option>
            <option value="purple">purple</option>
        </select>
    @error('color')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
<div class="dropdown">
    <strong>Status :</strong>
        <select  class="btn btn-secondary" name="status">
            <option value="In Stock">In Stock</option>
            <option value="Out of Stock">Out of Stock</option>
        </select>
    @error('status')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>
</div>
</div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Buying price:</strong>
                <input type="number" name="buying_price" class="form-control" step="0.01" placeholder="Product buying price">
                @error('buying_price')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
                </div>
                </div>


<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Selling price:</strong>
    <input type="number" name="selling_price" class="form-control" step="0.01" placeholder="Product selling price">
    @error('selling_price')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    </div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>

</div>

</form>
</body>
</html>