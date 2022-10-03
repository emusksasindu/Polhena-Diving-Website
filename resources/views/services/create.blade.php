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
             <form role="form" action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                 <div class="form-group">
                     <h2>Add New Service</h2>
                     <div class="gap"></div>
                     @if(session('success'))
                     <div class="alert alert-success mb-1 mt-1">
                         {{ session('success') }}
                     </div>
                     @endif
                     <div class="cardBox d-flex justify-content-center">
                        <div class="card ">
                            <img id="i_1" class= "product_image mb-4" src="#" alt="your image" />
                            <input type="file" accept="image/*" id="#product_image_1" name="imageUrl_1" onchange="loadFile_1(event)" >
                            @error('image_1')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The image 1 field is required." ? "Please select a image!" :$message  }}</div>
                            @enderror
                        </div>

                        <div class="card ">
                            <img id="i_2" class= "product_image mb-4" src="#" alt="your image" />
                            <input type="file" accept="image/*" id="#product_image_2" name="imageUrl_2" onchange="loadFile_2(event)" >
                            
                            @error('image_2')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The image 1 field is required." ? "Please select a image!" :$message  }}</div>
                            @enderror
                        </div>

                        <div class="card ">
                            <img id="i_3" class= "product_image mb-4" src="#" alt="your image" />
                            <input type="file" accept="image/*" id="#product_image_3" name="imageUrl_3" onchange="loadFile_3(event)" >
                            
                            @error('image_3')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message == "The image 1 field is required." ? "Please select a image!" :$message  }}</div>
                            @enderror
                        </div>
                     </div>
    <!-- ======================= Cards end ================== -->
                     <h2 class="numbers">Service Name</h2>
                     <input type="text" name= "name" class="form-control" id="ProductName"
                            placeholder="enter the service name" >
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Service Description</h2>
                     <input type="text" name="description" class="form-control" id="ProductDescription"
                            placeholder="enter the service description" >
                            @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Service Category</h2>
                    
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
                    <h2 class="numbers" >Cost</h2>
                    <input type="text" name="cost" class="form-control" id="Cost"
                           placeholder="enter the cost">
                           @error('cost')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                </div>

                <div class="gap"></div>
                <div class="form-group">
                   <h2 class="numbers">Selling Price</h2>
                   <input type="text" name="selling_price" class="form-control" id="SellingPrice"
                          placeholder="enter the selling price">
                          @error('selling_price')
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