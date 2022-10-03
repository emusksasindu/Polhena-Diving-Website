
       @include('layouts.admin_navi')
       <!-- ========================= Main ==================== -->
       
       <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
               
            </div>
            @if(session('success'))
                <div class="alert alert-success mb-1 mt-1">
                {{ session('success') }}
                </div>
            @endif

            <div class="cardBox d-flex justify-content-end">
            <div class="card_button">
                <div class="iconBx">
                    <div class="row">
                    <a class="numbers col-sm" href="{{ route('services.create') }}">Add Service</a>
                  
                    <ion-icon name="people-circle-outline" role="img" class="md hydrated col-sm" aria-label="eye outline"></ion-icon>
                    </div>
                </div>
            </div>
            </div>

           
            <!-- ================ Services Details List ================= -->
           
            <div class="details">
                <div class="recentOrders">
                   
                    <div class="cardHeader">
                        <h2>Latest Services</h2>
                        @if(count($services) != 0)
                               
                                    <p>Showing {{($services->currentpage()-1)*$services->perpage()+1}} to 
                                        {{$services->currentpage()*$services->perpage() < $services->total() ? 
                                        $services->currentpage()*$services->perpage():
                                        $services->total();
                                        }} of 
                                        {{$services->total()}} results
                                    </p>

                               
                               @else 
                               <p>No Results
                            </p>

                           
                           @endif
                        
                    </div>

                    <table>
                        <thead>
                            <div class="input-group">
                                <form action="{{ route('services.adminsearch') }}" method="POST">
                                    @csrf
                                <div class="form-outline">
                                    <input type="search" id="form1" name ='keyword' class="form-control" placeholder="Search"/>
                                </div>
                                </form>
                              </div>
                            <tr>
                                
                                <td>Image</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Cost</td>
                                <td>Action</td>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td><img src="/storage/{{$service->imageUrl_1}}" alt=""></td>
                                <td>{{$service->id}}</td>
                                <td>{{$service->description}}</td>
                                <td>${{$service->selling_price}}</td>
                                <td>${{$service->cost}}</td>
                                <td><span class="status {{$service->status == "in stock"? 'inProgress' : 'return'}}">{{$service->status == "in stock"? 'In Stock' : 'Out of stock'}}</span></td>
                                <form action="{{ route('services.destroy') }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                <input type="hidden" name='id'  value="{{$service->id}}"/>
                                <td><a class="btn btn-primary bg-indigo me-4" href="{{ route('services.edit',$service) }}"><ion-icon href="#" name="pencil-outline"></ion-icon></a><button type="submit" class="btn btn-danger"><ion-icon  name="trash-outline"></ion-icon></button></td>
                                </form>
                            
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