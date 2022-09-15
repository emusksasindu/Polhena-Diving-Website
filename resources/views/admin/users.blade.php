
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
                <div class="card_button">
                    <div class="iconBx">
                        <div class="row">
                        <span class="numbers col-sm">Add User</span>
                      
                        <ion-icon name="person-add-outline" role="img" class="md hydrated col-sm" aria-label="eye outline"></ion-icon>
                        </div>
                    </div>
    
                </div>
                </div>

            <!-- ================ User Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Users</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <div class="input-group">
                                <div class="form-outline">
                                  <input type="search" id="form1" class="form-control" placeholder="Search"/>
                                </div>
                                
                            </div>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Type</td>
                                <td>Status</td>
                                <td>Edit/Delete</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Sasindu</td>
                                <td>Admin</td>
                                <td><span class="status delivered">Active</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Randunu</td>
                                <td>User</td>
                                <td><span class="status return">disabled</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>
                            </tr>

                            <tr>
                            <td>3</td>
                                <td>Randunu</td>
                                <td>User</td>
                                <td><span class="status return">disabled</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>
                            </tr>

                            <tr>
                            <td>4</td>
                                <td>Sasindu</td>
                                <td>Admin</td>
                                <td><span class="status delivered">Active</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>
                            </tr>

                            <tr>
                            <td>5</td>
                                <td>Sasindu</td>
                                <td>Admin</td>
                                <td><span class="status delivered">Active</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>
                            </tr>

                            <tr>
                            <td>6</td>
                                <td>Sasindu</td>
                                <td>Admin</td>
                                <td><span class="status delivered">Active</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>
                            </tr>

                            <tr>
                            <td>7</td>
                                <td>Sasindu</td>
                                <td>Admin</td>
                                <td><span class="status delivered">Active</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>
                            </tr>

                            <tr>
                            <td>8</td>
                                <td>Sasindu</td>
                                <td>Admin</td>
                                <td><span class="status delivered">Active</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>
                            </tr>
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