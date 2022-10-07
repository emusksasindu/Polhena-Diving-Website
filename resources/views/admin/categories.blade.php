
       @include('layouts.admin_navi')
       <!-- ========================= Main ==================== -->

       <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

            </div>


            <div class="cardBox d-flex justify-content-end">

                <div class="card_button" >
                    <div class="iconBx">
                        <div class="row">
                        <a class="numbers col-sm" href="{{ route('categories.create') }}">Add Category</a>

                        <ion-icon name="add-circle-outline" role="img" class="md hydrated col-sm" aria-label="eye outline"></ion-icon>
                        </div>
                    </div>

                </div>

            </div>


            <!-- ================ Product Details List ================= -->

            <div class="details">
                <div class="recentOrders">

                    <div class="cardHeader">
                        <h2>Categories</h2>
                    </div>

                    <table  id="categoriesTable" class="display" style="width:100%">
                        <thead>


                            <tr>
                                <td>Name</td>
                                <td>Type</td>
                                <td>Created_at</td>
                                <td>Updated_at</td>
                                <td>Action</td>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category ['name']}}</td>
                                <td>{{$category ['type']}}</td>
                                <td>{{$category ['created_at']}}</td>
                                <td>{{$category ['updated_at']}}</td>
                                <td>
                                    {{-- <a href="/editcategories/{{$category->id}}" target="popup" onclick="window.open('/editcategories/{{$category->id}}','popup','width=800,height=700')"><ion-icon name="pencil-outline"></ion-icon></a> --}}

                                    <a data-bs-toggle="modal" data-bs-target="#editcategoryModal{{$category ['id']}}"><ion-icon name="pencil-outline"></ion-icon></a>
                                    <a href="deletecategory/{{$category->id}}"><ion-icon name="trash-outline"></ion-icon></a>


                                    <!-- Modal -->
                                    <div class="modal fade " id="editcategoryModal{{$category ['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1><h2>Edit Category Details</h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="/categoryupdated" method="POST" >

                                                @csrf

                                                <div class="form-group">


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
                                                    <input type="hidden" name="id" value="{{$category->id}}" class="form-control">
                                                    <h2 class="numbers">Category Name *</h2>
                                                    <input type="text" name="name" value="{{$category->name}}" class="form-control" id="name"
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


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn ">Save Changes</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>


            {{-- </div>{{$category->id}} --}}
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="js/admin_script.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<script>
    $(document).ready(function () {
        $('#categoriesTable').DataTable();
    });
</script>
