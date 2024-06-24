
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
                        <div class="numbers">{{$OrderCount}}</div>
                        <div class="cardName">Total Orders</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="download-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">${{$Revenue}}</div>
                        <div class="cardName">Revenue</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="diamond-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{$Stock}}</div>
                        <div class="cardName">Stock</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="file-tray-stacked-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">${{$Profit}}</div>
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
                        @if(count($orders) != 0)
                               
                        <p>Showing {{($orders->currentpage()-1)*$orders->perpage()+1}} to 
                            {{$orders->currentpage()*$orders->perpage() < $orders->total() ? 
                            $orders->currentpage()*$orders->perpage():
                            $orders->total();
                            }} of 
                            {{$orders->total()}} results
                        </p>

                   
                   @else 
                   <p>No Results
                </p>

               
               @endif 
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
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->orderID}}</td>
                                <td>{{$order->receiver_name}}</td>
                                <td>{{$order->shipping_address}}</td>
                                <td>{{$order->number}}</td>
                                <td>{{$order->total}}</td>
                                <td><span class="status delivered">{{$order->status}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center">
                        {!! $orders->links() !!}
                    </div>
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