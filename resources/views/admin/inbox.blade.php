
       @include('layouts.admin_navi')
       <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

            </div>

            <!-- ======================= Message Cards list ================== -->

            <div class="details">

                <div class="recentOrders">
                    <h2 class="h2">Inbox</h2>
                    
                    <div class="cardHeader">


                        <div class="inboxCard">

                            <div class="gap"></div>
                            @foreach ( $messages as $message )


                            <div class="card">
                                <div>
                                    <div class="numbers">{{$message ['name']}}</div>
                                    <div class="cardName">{{$message ['body']}}</div>
                                </div>

                                <span class="d-flex flex-row-reverse"> <div class="iconBx">
                                    <a href="deletemessage/{{$message->id}}"><ion-icon name="trash-outline"></ion-icon></a>
                                </div>
                            </div>


                            <div class="gap"></div>
                            @endforeach

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
