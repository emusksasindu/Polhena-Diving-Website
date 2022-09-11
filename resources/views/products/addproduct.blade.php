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
             <form role="form">

               

                 <div class="form-group">
                     <h2>Add New Product</h2>
                     <div class="gap"></div>
                     <div class="cardBox d-flex justify-content-center">
                        <div class="card ">
                            <a class="numbers d-flex justify-content-center" >add image</a>
                        </div>
                     </div>
                    
                     <h2 class="numbers">Product Name</h2>
                     <input type="text" name= "ProductName" class="form-control" id="ProductName"
                            placeholder="enter product name" >
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Product description</h2>
                     <input type="text" name="ProductDescription" class="form-control" id="ProductDescription"
                            placeholder="enter product description" >
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Quantity</h2>
                     <input type="text" name="Quantity" class="form-control" id="Quantity"
                            placeholder="enter quantity">
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                    <h2 class="numbers" >Cost</h2>
                    <input type="text" name="Cost" class="form-control" id="Cost"
                           placeholder="enter cost">
                </div>

                <div class="gap"></div>
                <div class="form-group">
                   <h2 class="numbers">Selling Price</h2>
                   <input type="text" name="SellingPrice" class="form-control" id="SellingPrice"
                          placeholder="enter selling price">
               </div>

               <div class="gap"></div>
               <div class="form-group">
                  <h2 class="numbers">Discount</h2>
                  <input type="text" name="Discount" class="form-control" id="Discount"
                         placeholder="enter discount">
              </div>

              <div class="gap"></div>
               <div class="form-group">
                  <h2 class="numbers">Colour</h2>
                  <input type="text" name="Discount" class="form-control" id="Discount"
                         placeholder="enter discount">
              </div>

              <div class="gap"></div>
              <div class="form-group">
                 <h2 class="numbers">Status</h2>
                 <input type="text" name="Discount" class="form-control" id="Discount"
                        placeholder="enter discount">
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