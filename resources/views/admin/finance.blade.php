
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
                <div class="card">
                    <div>
                        <div class="numbers">Purchased Products</div>
                       
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

</html>