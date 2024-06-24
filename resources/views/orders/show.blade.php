@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/product/bootstrap.min.css') }}" type="text/css">
<section class="OrderView">

    <div class="content">
        <div class="gap"></div>

        <form action="{{ route('order.cancelOrder') }}" method="POST">
            @csrf
            @if (session('status'))
                <span class="valid-feedback" role="alert">
                    <strong>{{ session('status') }}</strong>
                </span>
            @endif
            <table class="table table-hover OrderHistoryTable OrderTable">

                <tbody>
                    <tr class="thead-dark">
                        <th scope="col">Order Details</th>
                    </tr>
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

                    <tr class="thead-dark">
                        <th scope="col">Payment Details</th>
                    </tr>
                    <tr>
                        <th scope="row">Card Number</th>
                        <th class="OrderTableValue" scope="col">: {{ $payment->card_number }}</th>
                    </tr>

                    <tr>
                        <th scope="row">status</th>
                        <th class="OrderTableValue" scope="col">: {{ $payment->status }}</th>
                    </tr>

                    @if ($order->status == 'process')
                        <tr>
                            <th scope="row">Action</th>
                            <input type="hidden" name='id' value="{{ $order->id }}">
                            <th class="OrderTableValue" scope="col">: <button type="submit" class="btn ">Cancel
                                    Order</button></th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </form>

    </div>

    <div class="content">
        <div class="gap"></div>
        <form action="">
            <table class="table table-hover OrderHistoryTable">
                <tr class="thead-dark">
                    <th scope="col">Item List</th>
                </tr>
                <table>
                    <table class="table table-hover OrderHistoryTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">IMAGE</th>
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
                                    <td><img src="/storage/{{ $product->image_1 }}" alt=""></td>
                                    <th scope="row">{{ $product->productID }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->qty }}</td>
                                    <td>{{ $product->pivot->size }}</td>
                                    <td>${{ round($product->pivot->discount, 2) }}</td>
                                    <td>${{ round($product->pivot->total, 2) }}</td>
                                </tr>
                            @endforeach

                            @foreach ($services as $service)
                                <tr>
                                    <td><img src="/storage/{{ $service->imageUrl_1 }}" alt=""></td>
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
        </form>

    </div>


</section>

@include('layouts.footer')
