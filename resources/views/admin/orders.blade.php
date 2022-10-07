
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


                    </div>

                    <table id="ordersTable" class="display" style="width:100%">
                        <thead>

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
                            @foreach ($orders as $order)


                            <tr>
                                <td>{{$order ['id']}}</td>
                                <td>{{$order ['receiver_name']}}</td>
                                <td>{{$order ['country']}}</td>
                                <td>{{$order ['created_at']}}</td>
                                <td>{{$order ['sub_total']}}</td>
                                <td>{{$order ['discount']}}</td>
                                <td>{{$order ['total']}}</td>
                                <td>{{$order ['number']}}</td>
                                <td>

                                    @if ($order->status=="processing")
                                        <a type="button" class="status inProgress" data-bs-toggle="modal" data-bs-target="#editorderstatus{{$order ['id']}}">
                                    {{$order ['status']}}</a>

                                    @elseif($order->status=="delivered")
                                        <a type="button" class="status delivered" data-bs-toggle="modal" data-bs-target="#editorderstatus{{$order ['id']}}">
                                    {{$order ['status']}}</a>

                                    @elseif($order->status=="cancelled")
                                        <a type="button" class="status return" data-bs-toggle="modal" data-bs-target="#editorderstatus{{$order ['id']}}">
                                    {{$order ['status']}}</a>

                                    @endif



                                    <!-- Modal -->
                                    <div class="modal fade" id="editorderstatus{{$order ['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5><h2>Order Status</h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                        <form method="POST" action="/statusupdated">
                                            @csrf
                                            <input type="hidden" name="id" class="form-control"  value="{{$order->id}}" >
                                            <div class="form-group">
                                                <div class="dropdown">
                                                <select  class="btn btn-secondary" name="status">
                                                    <option value= "processing" >Processing</option>
                                                    <option value= "delivered" >Delivered</option>
                                                    <option value= "cancelled" >Cancelled</option>
                                                </select>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                        </form>
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
        $('#ordersTable').DataTable();
    });
</script>
