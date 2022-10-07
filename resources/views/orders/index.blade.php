@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/product/bootstrap.min.css') }}" type="text/css">
<section class="UserProfile">

    <div class="content">
        <div class="gap"></div>
        <h1 class="heading">Order History</h1>

        <form action="">
            <table class="table table-hover OrderHistoryTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ORDER ID</th>
                        <th scope="col">Receiver Name</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->orderID }}</th>
                            <td>{{ $order->receiver_name }}</td>
                            <td>${{ $order->total }}</td>
                            <td>{{ $order->status }}</td>
                            <td><a style="text-decoration:none" href='{{ route('orders.show',$order) }}'>View More </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>

    </div>


</section>
<script src="{{ asset('js/product/bootstrap.min.js') }}"></script>
@include('layouts.footer')
