
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
                        <h2>Latest Products</h2>
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
                                <td>Image</td>
                                <td>ID</td>
                                <td>Name</td>
                                <td>QTY</td>
                                <td>Cost</td>
                                <td>Selling Price</td>
                                <td>Discount</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td>Rs:7500.00</td>
                                <td>Rs:500.00</td>
                                <td><span class="status delivered">Delivered</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>2</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td>Rs:7500.00</td>
                                <td>Rs:500.00</td>
                                <td><span class="status pending">Pending</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>3</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td>Rs:7500.00</td>
                                <td>Rs:500.00</td>
                                <td><span class="status return">Return</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>4</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td>Rs:7500.00</td>
                                <td>Rs:500.00</td>
                                <td><span class="status inProgress">In Progress</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>5</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td>Rs:7500.00</td>
                                <td>Rs:500.00</td>
                                <td><span class="status delivered">Delivered</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>6</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td>Rs:7500.00</td>
                                <td>Rs:500.00</td>
                                <td><span class="status pending">Pending</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>7</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td>Rs:7500.00</td>
                                <td>Rs:500.00</td>
                                <td><span class="status return">Return</span></td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>8</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td>Rs:7500.00</td>
                                <td>Rs:500.00</td>
                                <td><span class="status inProgress">In Progress</span></td>
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