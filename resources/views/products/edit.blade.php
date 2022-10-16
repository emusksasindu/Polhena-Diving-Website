@include('layouts.admin_navi')     
<!-- ========================= Main ==================== -->
 <div class="main">
     <div class="topbar">
         <div class="toggle">
             <ion-icon name="menu-outline"></ion-icon>
         </div>
        
     </div>
    

     <!-- ======================= Cards ================== -->
    
     <div class="cardProfile">
         <div class="card">
             <form role="form" action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                 <div class="form-group">
                     <h2>Edit existing Product</h2>
                     <div class="gap"></div>
                     @if(session('success'))
                     <div class="alert alert-success mb-1 mt-1">
                         {{ session('success') }}
                     </div>
                     @endif
                     <div class="cardBox d-flex justify-content-center">
                        <div class="card ">
                            <img id="i_1" class= "product_image" src="/storage/{{$product->image_1}}" alt="your image" />
                            <input type="file" id="product_image_1" name="image_1"  onchange="loadFile_1(event)">
                            @error('image_1')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The image 1 field is required." ? "Please select a image!" :$message  }}</div>
                            @enderror
                        </div>
                        <div class="card ">
                            <img id="i_2" src='/storage/{{$product->image_2}}' class= "product_image"  alt="your image" />
                            <input type="file" id="product_image_1" name="image_2"  onchange="loadFile_2(event)">
                            @error('image_2')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The image 2 field is required." ? "Please select a image!" :$message  }}</div>
                            @enderror
                        </div>
                        <div class="card ">
                            <img id="i_3" class= "product_image"  src='/storage/{{$product->image_3}}' alt="your image" />
                            <input type="file" id="product_image_1" name="image_3" onchange="loadFile_3(event)">
                            @error('image_3')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The image 3 field is required." ? "Please select a image!" :$message  }}</div>
                            @enderror
                        </div>
                      
                     </div>
    <!-- ======================= Cards end ================== -->
                     <h2 class="numbers">Product Name</h2>
                     <input type="text" name= "name" class="form-control" id="ProductName"
                            placeholder="enter product name" value='{{$product->name}}'>
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Product Description</h2>
                     <input type="text" name="description" class="form-control" id="ProductDescription"
                            placeholder="enter product description" value='{{$product->description}}' >
                            @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Product Category</h2>
                    
                     <div class="dropdown">
                            <select  class="btn btn-secondary" name="category_id">
                                @foreach ($categories as $category)
                                <option value= "{{ $category->id }}" >{{ $category->name }}</option>
                                @endforeach
                            </select>
                      
                    </div>
                            @error('category_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The categories id field is required." ? "Please select a valid category!" :$message  }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Small Quantity</h2>
                     <input type="text" name="small_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity" value='{{$product->small_qty}}'>
                            @error('small_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Medium Quantity</h2>
                     <input type="text" name="medium_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity" value='{{$product->medium_qty}}'>
                            @error('medium_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Large Quantity</h2>
                     <input type="text" name="large_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity" value='{{$product->large_qty}}'>
                            @error('large_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">XL Quantity</h2>
                     <input type="text" name="xl_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity" value='{{$product->xl_qty}}'>
                            @error('xl_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">XXL Quantity</h2>
                     <input type="text" name="xxl_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity" value='{{$product->xxl_qty}}'>
                            @error('xxl_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                    <h2 class="numbers" >Cost</h2>
                    <input type="text" name="cost" class="form-control" id="Cost"
                           placeholder="enter cost" value='{{$product->cost}}'>
                           @error('cost')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                </div>

                <div class="gap"></div>
                <div class="form-group">
                   <h2 class="numbers">Selling Price</h2>
                   <input type="text" name="selling_price" class="form-control" id="SellingPrice"
                          placeholder="enter selling price" value='{{$product->selling_price}}'>
                          @error('selling_price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
               </div>

               <div class="gap"></div>
               <div class="form-group">
                  <h2 class="numbers">Discount</h2>
                  <input type="text" name="discount" class="form-control" id="Discount"
                         placeholder="enter discount" value='{{$product->discount}}'>
                         @error('discount')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
              </div>

              <div class="gap"></div>
              <div class="form-group">
                 <h2 class="numbers">Status</h2>
                 <div class="dropdown">
                    <select class="btn btn-secondary" name="status">
                        
                            <option value="in stock">InStock</option>
                            <option value="out of stock">Out Of Stock</option>
                        
                    </select>

                </div>
                        @error('status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
             </div>

               <div class="gap"></div>
                 <button type="submit" class="btn">Update</button>

             </form>

             
         </div>

      
     </div>


<!-- =========== Scripts =========  -->
<script src='{{asset("js/admin_script.js")}}'></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>