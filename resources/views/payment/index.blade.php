@include('layouts.admin_navi')
<!-- ========================= Main ==================== -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>

    </div>




    <!-- ======================= Table ================== -->
    <div class="cardFinance d-flex justify-content-center">
        <div class="card">
            <div>
                <div class="numbers">Payment History</div>
                <div class="input-group">


                </div>
                <div class="gap"></div>
                <div class="recentOrders table-wrapper-scroll-y my-custom-scrollbar">

                    <table id="purchasedproducts" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Card Number</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <th scope="row">{{ $payment->card_number }}</th>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td><a href="{{ route('showorders.show',$payment->order)}}">View Order</a></td>
                                </tr>
                            @endforeach
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
