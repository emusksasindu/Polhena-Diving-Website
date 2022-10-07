
       @include('layouts.admin_navi')
       <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox d-flex justify-content-end">
                <div class="card_button ">
                    <div class="iconBx">
                        <div class="row">
                        <span  class="numbers col-sm"><a href="/addpost">Add Post</a></span>

                        <ion-icon name="newspaper-outline" role="img" class="md hydrated col-sm" aria-label="eye outline"></ion-icon>
                        </div>
                    </div>

                </div>
                </div>

            <!-- ================ Posts Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Posts</h2>

                    </div>

                    <table id="postsTable" class="display" style="width:100%">
                        <thead>

                            <tr>
                                <td>ID</td>
                                <td>Post Title</td>
                                <td>Type</td>
                                <td>Edit/Delete</td>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post ['id']}}</td>
                                <td>{{$post ['title']}}</td>
                                <td><span class="status delivered">{{$post ['type']}}</span></td>
                                <td>

                                    <a data-bs-toggle="modal" data-bs-target="#editPostModal{{$post ['id']}}"><ion-icon name="pencil-outline"></ion-icon></a>
                                    <a href="deletepost/{{$post->id}}"><ion-icon name="trash-outline"></ion-icon></a>



                                    <!-- Modal -->
                                    <div class="modal fade" id="editPostModal{{$post ['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editPostModal{{$post ['id']}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="editPostModal{{$post ['id']}}Label"></h1><h2>Edit Post Details</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" action="/postupdated" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" class="form-control"  value="{{$post->id}}" >

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
                                                        <h2 >Post Title</h2>
                                                        <input type="text" name="title" class="form-control"  value="{{$post->title}}" >
                                                                @error('name')
                                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                                @enderror
                                                        <h2 class="numbers">Cover Image</h2>
                                                        <input type="file" name= "imageUrl" class="form-control" src="/storage/{{$post->imageUrl}}" >
                                                        <h2 class="numbers">Body</h2>
                                                        <input type="text" name= "body" class="form-control" value="{{$post->body}}" >
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


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn">Save changes</button>
                                            </div>
                                            </form>
                                            </div>
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
        $('#postsTable').DataTable();
    });
</script>
