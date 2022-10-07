<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- ======= Styles ====== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>




     <div class="cardProfile">
         <div class="card">
             <form role="form" action="/postupdated" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" class="form-control"  value="{{$data->id}}" >

                 <div class="form-group">
                     <h2>Edit Post Details</h2>

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
                     <input type="text" name="title" class="form-control"  value="{{$data->title}}" >
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                    <h2 class="numbers">Cover Image</h2>
                     <input type="file" name= "imageUrl" class="form-control" src="/storage/{{$data->imageUrl}}" >
                     <h2 class="numbers">Body</h2>
                     <input type="text" name= "body" class="form-control" value="{{$data->body}}" >
                 </div>
                 <div class="gap"></div>
                 <div class="form-group">
                     <h2 class="numbers">Post Type</h2>
                    <div class="dropdown">
                    <select  class="btn btn-secondary" name="type">
                        <option value= "Blog" >blog</option>
                        <option value= "Post" >post</option>
                    </select>
                    </div>
                 </div>
                 <div class="gap"></div>
                 <button type="reset" class="btn btn-secondary">Clear</button>
                 <button type="submit" class="btn">Save changes</button>
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
