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
             <form role="form" action="/postcreated" method="POST" enctype="multipart/form-data">
                @csrf

                 <div class="form-group">
                     <h2>Add New Post</h2>

                     <div class="gap"></div>

                     @if(count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Please Fill All Required Fields.!
                        </div>
                    @endif
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        {{ session()->get('message') }}
                    </div>
                    @endif
    <!-- ======================= Fields ================== -->
                     <h2 class="numbers">Post Title</h2>
                     <input type="text" name= "title" class="form-control" id="name"placeholder="enter post title" >
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    <h2 class="numbers">Cover Image</h2>
                     <input type="file" name= "imageUrl" class="form-control"  >
                     <h2 class="numbers">Body</h2>
                     <input type="text" name= "body" class="form-control" placeholder="enter post details" >
                 </div>
                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Category Type</h2>
                    <div class="dropdown">
                    <select  class="btn btn-secondary" name="type">
                        <option value= "Blog" >blog</option>
                        <option value= "Post" >post</option>
                    </select>
                    </div>
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
