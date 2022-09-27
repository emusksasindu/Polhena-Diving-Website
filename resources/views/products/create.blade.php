@include('layouts.admin_navi')     
<!-- ========================= Main ==================== -->
 <div class="main">
     <div class="topbar">
         <div class="toggle">
             <ion-icon name="menu-outline"></ion-icon>
         </div>
        
     </div>
     @if(session('status'))
     <div class="alert alert-success mb-1 mt-1">
         {{ session('status') }}
     </div>
     @endif

     <!-- ======================= Cards ================== -->
    
     <div class="cardProfile">
         <div class="card">
             <form role="form" action="{{ url('products/add') }}" method="POST" enctype="multipart/form-data">
                @csrf

                 <div class="form-group">
                     <h2>Add New Product</h2>
                     <div class="gap"></div>
                     <div class="cardBox d-flex justify-content-center">
                        <div class="card ">
                            <a class="numbers d-flex justify-content-center" >add image 1</a>
                        </div>
                        <div class="card ">
                            <a class="numbers d-flex justify-content-center" >add image 2</a>
                        </div>
                        <div class="card ">
                            <a class="numbers d-flex justify-content-center" >add image 3</a>
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
                  <h2 class="numbers">Colour</h2>
                  <input type="text" name="colors" class="form-control" id="Discount"
                         placeholder="enter discount">
                         @error('colors')
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