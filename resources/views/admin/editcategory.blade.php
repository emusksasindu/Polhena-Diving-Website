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
             <form role="form" action="/categoryupdated" method="POST" >
                @csrf

                 <div class="form-group">
                     <h2>Edit Category Details</h2>

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
                     <input type="hidden" name="id" value="{{$data->id}}" class="form-control">
                     <h2 class="numbers">Category Name *</h2>
                     <input type="text" name="name" value="{{$data->name}}" class="form-control" id="name"
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

                 <button type="submit" class="btn">Save Changes</button>

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
