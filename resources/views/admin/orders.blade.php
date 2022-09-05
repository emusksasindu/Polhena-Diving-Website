
       @include('layouts.admin_navi')
       <!-- ========================= Main ==================== -->
       
       <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
               
            </div>

        

           
            <!-- ================ orders Details List ================= -->
           
            <div class="details">
                <div class="recentOrders">
                   
                    <div class="cardHeader">
                        <h2>Latest Orders</h2>
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
                                <td>Address</td>
                                <td>Date</td>
                                <td>Subtotal</td>
                                <td>Discount</td>
                                <td>Total</td>
                                <td>Contact No</td>
                                <td>Status</td>

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>jane Doe</td>
                                <td>Sri Lanka</td>
                                <td>2022/09/05</td>
                                <td>Rs.150000.00</td>
                                <td>Rs.50000.00</td>
                                <td>Rs.100000.00</td>
                                <td>0112689456</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>jane Doe</td>
                                <td>Sri Lanka</td>
                                <td>2022/09/05</td>
                                <td>Rs.150000.00</td>
                                <td>Rs.50000.00</td>
                                <td>Rs.100000.00</td>
                                <td>0112689456</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>jane Doe</td>
                                <td>Sri Lanka</td>
                                <td>2022/09/05</td>
                                <td>Rs.150000.00</td>
                                <td>Rs.50000.00</td>
                                <td>Rs.100000.00</td>
                                <td>0112689456</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>jane Doe</td>
                                <td>Sri Lanka</td>
                                <td>2022/09/05</td>
                                <td>Rs.150000.00</td>
                                <td>Rs.50000.00</td>
                                <td>Rs.100000.00</td>
                                <td>0112689456</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>jane Doe</td>
                                <td>Sri Lanka</td>
                                <td>2022/09/05</td>
                                <td>Rs.150000.00</td>
                                <td>Rs.50000.00</td>
                                <td>Rs.100000.00</td>
                                <td>0112689456</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>jane Doe</td>
                                <td>Sri Lanka</td>
                                <td>2022/09/05</td>
                                <td>Rs.150000.00</td>
                                <td>Rs.50000.00</td>
                                <td>Rs.100000.00</td>
                                <td>0112689456</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>jane Doe</td>
                                <td>Sri Lanka</td>
                                <td>2022/09/05</td>
                                <td>Rs.150000.00</td>
                                <td>Rs.50000.00</td>
                                <td>Rs.100000.00</td>
                                <td>0112689456</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>

                            <tr>
                            <td>jane Doe</td>
                                <td>Sri Lanka</td>
                                <td>2022/09/05</td>
                                <td>Rs.150000.00</td>
                                <td>Rs.50000.00</td>
                                <td>Rs.100000.00</td>
                                <td>0112689456</td>
                                <td><span class="status inProgress">In Progress</span></td>
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