
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
                                
                                <td>ID</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Price</td>
                                <td>Cost</td>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>1</td>
                                <td>Discover Scuba Diving</td>
                                <td>Scuba diving for beginners</td>
                                <td>Rs.136000.00</td>
                                <td>Rs.80000.00</td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Discover Scuba Diving</td>
                                <td>Scuba diving for beginners</td>
                                <td>Rs.136000.00</td>
                                <td>Rs.80000.00</td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>3</td>
                                <td>Discover Scuba Diving</td>
                                <td>Scuba diving for beginners</td>
                                <td>Rs.136000.00</td>
                                <td>Rs.80000.00</td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>4</td>
                                <td>Discover Scuba Diving</td>
                                <td>Scuba diving for beginners</td>
                                <td>Rs.136000.00</td>
                                <td>Rs.80000.00</td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Discover Scuba Diving</td>
                                <td>Scuba diving for beginners</td>
                                <td>Rs.136000.00</td>
                                <td>Rs.80000.00</td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>6</td>
                                <td>Discover Scuba Diving</td>
                                <td>Scuba diving for beginners</td>
                                <td>Rs.136000.00</td>
                                <td>Rs.80000.00</td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>7</td>
                                <td>Discover Scuba Diving</td>
                                <td>Scuba diving for beginners</td>
                                <td>Rs.136000.00</td>
                                <td>Rs.80000.00</td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>

                            </tr>

                            <tr>
                                <td>8</td>
                                <td>Discover Scuba Diving</td>
                                <td>Scuba diving for beginners</td>
                                <td>Rs.136000.00</td>
                                <td>Rs.80000.00</td>
                                <td><ion-icon name="pencil-outline"></ion-icon><ion-icon name="trash-outline"></ion-icon></td>
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