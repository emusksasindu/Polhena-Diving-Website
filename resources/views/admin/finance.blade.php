
       @include('layouts.admin_navi')
       <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

            </div>



            <!-- ======================= Cards ================== -->
            <div class="cardFinance2">

                        <form method="post">
                            <div id="labels">From</div>
                            <input type="text" class="w-25 form-control">
                            <div id="labels">To</div>
                            <input type="text" class="w-25 form-control">
                                <div class="gap"></div>
                            <div class="form-group"> <!-- Submit button -->
                            <button class="btn btn-primary " name="submit" type="submit">Search</button>
                            </div>
                        </form>








                <div class="cardFinance">
                    <div class="card">
                        <div>
                            <div class="numbers">50,000</div>
                            <div class="cardName">Revenue</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="eye-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">20,000</div>
                            <div class="cardName">Gross profit</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                    </div>


                </div>
  <!-- ======================= Purchased Products ================== -->
            <div class="cardFinance">
                <div class="card">
                    <div>
                        <div class="numbers">Purchased Products</div>
                        <div class="input-group">


                        </div>
                        <div class="gap"></div>
                        <div class="recentOrders table-wrapper-scroll-y my-custom-scrollbar">

                            <table id="purchasedproducts" class="table table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Price</td>
                                        <td>Payment</td>
                                        <td>Quantity</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($order_products as $order_product)
                                        <tr>
                                            <td>{{ $order_product['name'] }}</td>
                                            <td>${{ $order_product['price'] }}</td>
                                            <td>{{ $order_product['status'] }}</td>
                                            <td>{{ $order_product['quantity'] }}</td>
                                        </tr>    
                                    @endforeach
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

 <!-- ======================= Purchased Services ================== -->

                <div class="card">
                    <div>
                        <div class="numbers">Purchased Services</div>
                        <div class="input-group">
                            

                        </div>
                        <div class="gap"></div>
                        <div class="recentOrders table-wrapper-scroll-y my-custom-scrollbar">

                            <table id="purchasedservices" class="table table-bordered table-striped mb-0">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Price</td>
                                        <td>Payment</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($order_services as $order_service)
                                        <tr>
                                            <td>{{ $order_service['name'] }}</td>
                                            <td>${{ $order_service['price'] }}</td>
                                            <td>{{ $order_service['status'] }}</td>
                                            <td>{{ $order_service['quantity'] }}</td>
                                        </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>

            </div>

            <!-- ================ Graph ================= -->

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="js/admin_script.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<script>
    $(document).ready(function () {
        $('#purchasedservices').DataTable();
    });
</script>
<script>
    $(document).ready(function () {
        $('#purchasedproducts').DataTable();
    });
</script>

</html>
