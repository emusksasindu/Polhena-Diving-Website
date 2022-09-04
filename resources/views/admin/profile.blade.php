
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
                            <h2 class="numbers">Name</h2>
                            <input type="text" name= "Name" class="form-control" id="name"
                                   placeholder="Enter Name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="gap"></div>
                        <div class="form-group">
                            <h2 class="numbers" for="email">Email</h2>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="Enter email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="gap"></div>
                        <div class="form-group">
                            <h2 class="numbers" for="Password">Password</h2>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Enter Password" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="gap"></div>
                        <button type="submit" class="btn">Edit</button>

                    </form>

                    
                </div>

             
            </div>


    <!-- =========== Scripts =========  -->
    <script src="js/admin_script.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>