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
             <form role="form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                 <div class="form-group">
                     <h2>Add New Product</h2>
                     <div class="gap"></div>
                     @if(session('success'))
                     <div class="alert alert-success mb-1 mt-1">
                         {{ session('success') }}
                     </div>
                     @endif
                     <div class="cardBox d-flex justify-content-center">
                        <div class="card ">
                            <input type="file" id="#product_image_1" name="image_1">
                            @error('image_1')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The image 1 field is required." ? "Please select a image!" :$message  }}</div>
                            @enderror
                        </div>
                        <div class="card ">
                            <input type="file" id="#product_image_1" name="image_2">
                            @error('image_2')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The image 2 field is required." ? "Please select a image!" :$message  }}</div>
                            @enderror
                        </div>
                        <div class="card ">
                            <input type="file" id="#product_image_1" name="image_3">
                            @error('image_3')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The image 3 field is required." ? "Please select a image!" :$message  }}</div>
                            @enderror
                        </div>
                      
                     </div>
    <!-- ======================= Cards end ================== -->
                     <h2 class="numbers">Product Name</h2>
                     <input type="text" name= "name" class="form-control" id="ProductName"
                            placeholder="enter product name" >
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Product Description</h2>
                     <input type="text" name="description" class="form-control" id="ProductDescription"
                            placeholder="enter product description" >
                            @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Product Category</h2>
                    
                     <div class="dropdown">
                            <select  class="btn btn-secondary" name="categories_id">
                                @foreach ($categories as $category)
                                <option value= "{{ $category->id }}" >{{ $category->name }}</option>
                                @endforeach
                            </select>
                      
                    </div>
                            @error('categories_id')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The categories id field is required." ? "Please select a valid category!" :$message  }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Small Quantity</h2>
                     <input type="text" name="small_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity">
                            @error('small_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Medium Quantity</h2>
                     <input type="text" name="medium_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity">
                            @error('medium_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Large Quantity</h2>
                     <input type="text" name="large_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity">
                            @error('large_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">XL Quantity</h2>
                     <input type="text" name="xl_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity">
                            @error('xl_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">XXL Quantity</h2>
                     <input type="text" name="xxl_qty" class="form-control" id="Quantity"
                            placeholder="enter quantity">
                            @error('xxl_qty')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                    <h2 class="numbers" >Cost</h2>
                    <input type="text" name="cost" class="form-control" id="Cost"
                           placeholder="enter cost">
                           @error('cost')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                </div>

                <div class="gap"></div>
                <div class="form-group">
                   <h2 class="numbers">Selling Price</h2>
                   <input type="text" name="selling_price" class="form-control" id="SellingPrice"
                          placeholder="enter selling price">
                          @error('selling_price')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
               </div>

               <div class="gap"></div>
               <div class="form-group">
                  <h2 class="numbers">Discount</h2>
                  <input type="text" name="discount" class="form-control" id="Discount"
                         placeholder="enter discount">
                         @error('discount')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
              </div>

              <div class="gap"></div>
              <div class="form-group">
                 <h2 class="numbers">Status</h2>
                 <input type="text" name="status" class="form-control" id="Discount"
                        placeholder="status">
                        @error('status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
             </div>

               <div class="gap"></div>
                 <button type="submit" class="btn">Save</button>

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