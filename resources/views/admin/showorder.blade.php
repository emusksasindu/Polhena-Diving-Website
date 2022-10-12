@include('layouts.admin_navi')
<!-- ========================= Main ==================== -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>

    </div>




    <!-- ======================= Purchased Products ================== -->
    <div class="cardFinance">
        <div class="card">
            <div>
                <div class="numbers">Products</div>
                <div class="input-group">


                </div>
                <div class="gap"></div>
                <div class="recentOrders table-wrapper-scroll-y my-custom-scrollbar">

                    <table id="purchasedproducts" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">ITEM ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">QTY</th>
                                <th scope="col">SIZE</th>
                                <th scope="col">DISCOUNT</th>
                                <th scope="col">AMOUNT</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->productID }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->qty }}</td>
                                    <td>{{ $product->pivot->size }}</td>
                                    <td>${{ round($product->pivot->discount, 2) }}</td>
                                    <td>${{ round($product->pivot->total, 2) }}</td>
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
                <div class="numbers">Services</div>
                <div class="input-group">


                </div>
                <div class="gap"></div>
                <div class="recentOrders table-wrapper-scroll-y my-custom-scrollbar">

                    <table id="purchasedservices" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">ITEM ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">QTY</th>
                                <th scope="col">SIZE</th>
                                <th scope="col">DISCOUNT</th>
                                <th scope="col">AMOUNT</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <th scope="row">{{ $service->serviceID }}</th>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->pivot->qty }}</td>
                                <td>{{ $service->pivot->size }}</td>
                                <td>${{ round($service->pivot->discount, 2) }}</td>
                                <td>${{ round($service->pivot->total, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

    <div class="cardFinance d-flex justify-content-center">
        <div class="card ">
            <div>
                <div class="numbers">Order Details</div>
    
                <div class="gap"></div>
                <div class="recentOrders table-wrapper-scroll-y hidescroll">
                    
                      
                        @if (session('status'))
                            <span class="valid-feedback" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </span>
                        @endif
                        <table class="table table-hover OrderHistoryTable OrderTable ">
            
                            <tbody>
                             
                                <tr>
                                    <th scope="row">Order ID</th>
                                    <th class="OrderTableValue" scope="col">: {{ $order->orderID }}</th>
                                </tr>
                                <tr>
                                    <th scope="row">Shipping Address</th>
                                    <th class="OrderTableValue" scope="col">: {{ $order->shipping_address }}</th>
                                </tr>
                                <tr>
                                    <th scope="row">Receiver Name</th>
                                    <th class="OrderTableValue" scope="col">: {{ $order->receiver_name }}</th>
                                </tr>
            
                                <tr>
                                    <th scope="row">Contact Number</th>
                                    <th class="OrderTableValue" scope="col">: {{ $order->number }}</th>
                                </tr>
            
                                <tr>
                                    <th scope="row">country</th>
                                    <th class="OrderTableValue" scope="col">: {{ $order->country }}</th>
                                </tr>
            
                                <tr>
                                    <th scope="row">Email</th>
                                    <th class="OrderTableValue" scope="col">: {{ $order->email }}</th>
                                </tr>
            
                                <tr>
                                    <th scope="row">Sub Total</th>
                                    <th class="OrderTableValue" scope="col">: ${{ $order->sub_total }}</th>
                                </tr>
            
                                <tr>
                                    <th scope="row">Discount</th>
                                    <th class="OrderTableValue" scope="col">: ${{ $order->discount }}</th>
                                </tr>
            
                                <tr>
                                    <th scope="row">Total</th>
                                    <th class="OrderTableValue" scope="col">: ${{ $order->total }}</th>
                                </tr>
            
                                <tr>
                                    <th scope="row">Status</th>
                                    <th class="OrderTableValue" scope="col">: {{ $order->status }}</th>
                                </tr>
            
                               
                                <tr>
                                    <th scope="row">Card Number</th>
                                    <th class="OrderTableValue" scope="col">: {{ $payment->card_number }}</th>
                                </tr>
            
                                <tr>
                                    <th scope="row">status</th>
                                    <th class="OrderTableValue" scope="col">: {{ $payment->status }}</th>
                                </tr>
            
                            </tbody>
                        </table>
                   
                   
                </div>
            </div>
    
    
        </div>
    </div>

</div>





<x-admin_chat :chats="$chats" />
<!-- =========== Scripts =========  -->
<script src="js/admin_script.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

<style>
    .right {
        float: right;
        padding-bottom: 50px
    }

    .left {
        float: left;
    }
</style>
<script>
    $(document).ready(function() {
        $('#purchasedservices').DataTable({
            "dom": '<"right"i><"left"f>tp',

            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records"
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#purchasedproducts').DataTable({
            "dom": '<"right"i><"left"f>tp',

            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records"
            }
        });
    });
</script>

</html>
