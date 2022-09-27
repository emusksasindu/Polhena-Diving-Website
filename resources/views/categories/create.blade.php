@include('layouts.admin_navi')     
<!-- ========================= Main ==================== -->
 <div class="main">
     <div class="topbar">
         <div class="toggle">
             <ion-icon name="menu-outline"></ion-icon>
         </div>
        
     </div>
    

    
     <div class="cardProfile">
         <div class="card">
             <form role="form" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                 <div class="form-group">
                     <h2>Add New Category</h2>

                     <div class="gap"></div>
                     
                     @if(session('success'))
                     <div class="alert alert-success mb-1 mt-1">
                         {{ session('success') }}
                     </div>
                     @endif
                
                     
                     
    <!-- ======================= Fields ================== -->
                     <h2 class="numbers">Category Name</h2>
                     <input type="text" name= "name" class="form-control" id="name"
                            placeholder="enter the category name" >
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                 </div>

                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Category Type</h2>
                     <div class="dropdown">
                        <select  class="btn btn-secondary" name="type">
                            <option value= "product" >Product</option>
                            <option value= "service" >Service</option>
                        </select>
                  
                </div>
                            @error('type')
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