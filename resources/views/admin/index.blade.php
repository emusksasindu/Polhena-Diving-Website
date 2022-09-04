
       @include('layouts.admin_navi')
       <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
               
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Total Orders</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="download-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Revenue</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="diamond-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Stock</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="file-tray-stacked-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Profit</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Latest Order</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Order ID</td>
                                <td>Receiver Name</td>
                                <td>Address</td>
                                <td>Contact No</td>
                                <td>Total</td>
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
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td><span class="status return">Return</span></td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
                                <td><span class="status return">Return</span></td>
                            </tr>

                            <tr>
                                <td>8</td>
                                <td>John Doe</td>
                                <td>Sri lanka</td>
                                <td>0112985675</td>
                                <td>Rs:3500.00</td>
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