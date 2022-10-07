
       @include('layouts.admin_navi')
       <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

            </div>

            <!-- ======================= Cards ================== -->


            <!-- ================ User Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Users</h2>

                    </div>

                    <table  id="usersTable" class="display" style="width:100%">
                        <thead>

                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Type</td>
                                <td>Status</td>
                                <td>Edit/Delete</td>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user ['id']}}</td>
                                <td>{{$user ['name']}}</td>
                                <td>{{$user ['type']}}</td>
                                <td>
                                    @if ($user->status=="active")
                                    <span class="status delivered">{{$user ['status']}}</span>
                                    @elseif ($user->status=="blocked")
                                    <span class="status return">{{$user ['status']}}</span>
                                    @endif
                                </td>
                                <td>


                                    <a data-bs-toggle="modal" data-bs-target="#editcategoryModal{{$user ['id']}}"><ion-icon name="pencil-outline"></ion-icon></a>
                                    <a href="deleteuser/{{$user ['id']}}"><ion-icon name="trash-outline"></ion-icon></a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editcategoryModal{{$user ['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1><h2>Edit user Details</h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="/userupdated" method="POST" enctype="multipart/form-data">
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
                                                    <input type="hidden" name= "id" class="form-control" value="{{$user->id}}" >
                                                    <h2 class="numbers">Name </h2>
                                                    <input type="text" name="name" class="form-control"  value="{{$user->name}}" >
                                                            @error('name')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                            @enderror
                                                    <h2 class="numbers">email</h2>
                                                    <input type="text" name= "email" class="form-control" value="{{$user->email}}" >

                                                </div>
                                                <div class="gap"></div>
                                                <div class="form-group">
                                                    <h2 class="numbers">Status</h2>
                                                    <div class="dropdown">
                                                    <select  class="btn btn-secondary" name="status">
                                                        <option value= "active" >Active</option>
                                                        <option value= "blocked" >Blocked</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h2 class="numbers">user Type</h2>
                                                    <div class="dropdown">
                                                    <select  class="btn btn-secondary" name="type">
                                                        <option value= "A" >admin</option>
                                                        <option value= "U" >user</option>
                                                    </select>
                                                    </div>
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


            </div>
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
        $('#usersTable').DataTable();
    });
</script>
