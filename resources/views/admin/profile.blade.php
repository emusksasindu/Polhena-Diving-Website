
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

                    @if(count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            Please Fill All Required Details Currectly ..!
                        </div>
                    @endif
                    @if(session()->has('updatemsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        {{ session()->get('updatemsg') }}
                    </div>
                    @endif

                    



                    <form method="POST" action="/profileupdated">
                        @csrf
                        <input type="hidden" name= "id" class="form-control"  value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <h2 class="numbers">Name</h2>
                            <input type="text" name= "name" class="form-control" id="name"
                                   placeholder="Enter Name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="gap"></div>
                        <div class="form-group">
                            <h2 class="numbers" for="email">Email</h2>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="Enter email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="gap"></div>

                        <div class="gap"></div>

                        <button type="submit" class="btn">Edit</button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#changepassword">
                        Change Password
                        </button>
                    </form>

                        <!-- Modal -->
                        <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="/passwordchanged">
                                    @csrf
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5><h2>Change Password</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <h4 class="numbers" for="Password">Old Password</h4>
                                            <input type="password" name="oldpassword" class="form-control" placeholder="Enter Password" value="">
                                        </div>

                                        <div class="form-group">
                                            <h4 class="numbers" for="Password">New Password</h4>
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password" value="">
                                        </div>
                                        <div class="form-group">
                                            <h4 class="numbers" for="Password">Retype New Password</h4>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Password" value="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                </div>


            </div>
            <x-admin_chat :chats="$chats"/>

    <!-- =========== Scripts =========  -->
    <script src="js/admin_script.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
