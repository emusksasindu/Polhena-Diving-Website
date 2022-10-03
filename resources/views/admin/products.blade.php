
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
                        <a class="numbers col-sm" href="{{ route('products.create') }}">Add Product</a>
                      
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
                        @if(count($products) != 0)
                               
                                    <p>Showing {{($products->currentpage()-1)*$products->perpage()+1}} to 
                                        {{$products->currentpage()*$products->perpage() < $products->total() ? 
                                        $products->currentpage()*$products->perpage():
                                        $products->total();
                                        }} of 
                                        {{$products->total()}} results
                                    </p>

                               
                               @else 
                               <p>No Results
                            </p>

                           
                           @endif    
                    </div>

                    <table>
                        <thead>
                            <div class="input-group">
                                <form action="{{ route('products.adminsearch') }}" method="POST">
                                    @csrf
                                <div class="form-outline">
                                  <input type="search" id="form1" name ='keyword' class="form-control" placeholder="Search"/>
                                </div>
                                </form>
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
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><img src="/storage/{{$product->image_1}}" alt=""></td>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->small_qty + $product->medium_qty + $product->large_qty + $product->xl_qty + $product->xxl_qty}}</td>
                                <td>${{$product->cost}}</td>
                                <td>${{$product->selling_price}}</td>
                                <td>{{$product->discount}}%</td>
                                <td><span class="status {{$product->status == "in stock"? 'inProgress' : 'return'}}">{{$product->status == "in stock"? 'In Stock' : 'Out of stock'}}</span></td>
                                <form action="{{ route('products.destroy') }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name='id'  value="{{$product->id}}"/>
                                <td><a class="btn btn-primary bg-indigo me-4" href="{{ route('products.edit',$product) }}"><ion-icon href="#" name="pencil-outline"></ion-icon></a><button type="submit" class="btn btn-danger"><ion-icon  name="trash-outline"></ion-icon></button></td>
                                </form>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    
                </div>
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center">
                        {!! $products->links() !!}
                    </div>
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