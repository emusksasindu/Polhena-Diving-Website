
       {{-- @include('layouts.admin_navi') --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
       <!-- ========================= Main ==================== -->
        <div class="main">
            <!-- ======================= Cards ================== -->
            <div class="cardFinance2">
 
                <div class="StaticChat">
                    <input type="hidden" id="chatWindowValue" value="10" >
                    <div class="card" style="max-height: 10%; bottom: 0;" id="chatWindowCard">
                        <div class="numbers" id="chatWindow" style="font-size: 20px">
                            @if (Auth::check())
                                {{ Auth::user()->name }}
                            @else
                                Chat
                            @endif
                        </div>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar scrollbar scrollbar-primary" id="chatMessageWindow">
                            <div id="display_area"></div>
                        </div> 


                        <div class="gap"></div>
                        <form action="" method="post" id="userChat">
                            
                            <div class="form-group shadow-textarea">
                                <div class="d-flex justify-content-center">
                                    @if (Auth::check())
                                        <input type="hidden" id="userType" value="U">
                                    @else
                                        <input type="hidden" id="userType" value="G">
                                    @endif
                                    <textarea class="form-control z-depth-1 rounded-pill" style="height: 76px; resize:none; overflow: hidden; max-height: 100px" id="userMessage" rows="3" placeholder="Write something here..."></textarea>
                                    <div class="h-gap"></div>
                                    <button type="submit" class="btn btn-primary rounded-pill">
                                        <ion-icon name="paper-plane-outline" style="font-size: 1.75rem;"></ion-icon>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ================ chat ================= -->
           
            </div>
        </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('js/admin_script.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

<script>
    

    $(document).ready(function() {
        updateChat()
        
        $("#userChat").submit(function(event) {
            event.preventDefault()
            const message = $("#userMessage").val()
            const userType = $("#userType").val()

            if (message != '') {
                $.ajax({
                    url: "../../save/chat",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "message" : message,
                        "type": userType
                    },
                    success: function(data){
                        $("#userMessage").val("")
                        updateChat()
                        var elem = document.getElementById('chatList');
                        elem.scrollTop = elem.scrollHeight;
                    }
                })
            }
        })
        
    })

    function updateChat() {
        $.ajax({
            url: "../../show/user/chat",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "display" : 1,
            },
            success: function(data){
                html = ""
                
                data.forEach((element, index) => {
                    if (index > 0) {
                        if (data[index-1].sender_type != data[index].sender_type) {
                            html += "<br>"
                        }
                    }
                    if (element.sender_type == "A") { // receiver_type
                        // html += "<div class='message-group-received'>"
                            html += "<div class='message-received'>"
                                html += "<div class='message-received-text'>"
                                    html += element.message
                                html += "</div>"
                            html += "</div>"
                        // html += "</div>"
                    } else {
                        // html += "<div class='message-group-sent'>"
                            html += "<div class='message-sent' >"
                                html += "<div class='message-sent-text'>"
                                    html += element.message
                                html += "</div>"
                            html += "</div>"
                        // html += "</div>"
                    }

                    
                });
                $("#display_area").html(html);
            }
        })
    }
    function scrollBottom() {
        updateChat()
        var objDiv = document.getElementById("chatMessageWindow");
        objDiv.scrollTop = objDiv.scrollHeight;
    }

    let timer = setInterval(updateChat, 500);
    setTimeout(scrollBottom, 501);

    $('#chatWindow').on('click', function() {
        const chatWindowValue = $("#chatWindowValue").val()
        if (chatWindowValue == 60) {
            $("#chatWindowValue").val(10)
            $("#chatWindowCard").attr("style", "max-height: 10%; bottom: 0;");
        } else {
            $("#chatWindowValue").val(60)
            $("#chatWindowCard").attr("style", "max-height: 60%; bottom: 0;");
        }
    })
</script>