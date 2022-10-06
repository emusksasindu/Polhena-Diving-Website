
       @include('layouts.admin_navi')

       <style>
        .dataTables_filter input { width: 150px }
       </style>
       <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                
            </div>

           

            <!-- ======================= Cards ================== -->
            <div class="cardFinance2">
                   
                
    
  <!-- ======================= Chat list ================== -->
            <div class="StaticChatList">
                <div class="card" style="max-height: 15%; bottom: 0" id="chatTableWindowCard">
                    <input type="hidden" id="chatTableWindowValue" value="15" >
                    <div>
                        
                        <div class="numbers" id="chatTableWindow">Chats</div>
                        
                        <div class="gap"></div>
                        <div class="recentOrders table-wrapper-scroll-y my-custom-scrollbar scrollbar scrollbar-primary " >
                           
                            <table class="table table-bordered table-striped mb-0 chatTable display" id="example" style="width:100%">
                                <thead>
                                   
                                    <tr>
                                        {{-- <td>#</td> --}}
                                        <td>Name</td>
                                        <td>view</td>
                                    </tr>
                                </thead>
        
                                <tbody>
                                    @foreach ($chats as $chat)
                                        <tr>
                                            {{-- <td>{{ $chat['user_id'] }}</td> --}}
                                            <td>{{ $chat['name'] }}</td>
                                            <td>
                                                <form action="{{ route('set_user_session') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="user_type" value="{{ $chat['user_type'] }}">
                                                    <input type="hidden" name="user_id" value="{{ $chat['user_id'] }}">
                                                    <input type="hidden" name="user_name" value="{{ $chat['name'] }}">
                                                    <button type="submit" class="btn btn-danger">View Chat <span class="badge badge-warning">{{ $chat['unreadChats'] }}</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                </div>
              </div>
            <!-- ======================= Chat ================== -->
            @if (session('chat_user_id') || session('chat_guest_id'))
                <div class="StaticChat"  >
                    <input type="hidden" id="chatWindowValue" value="10" >
                    <div class="card" style="max-height: 10%; bottom: 0;" id="chatWindowCard">
                        <div class="numbers" id="chatWindow" style="font-size: 20px">{{ session('chat_user_name') }}</div>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar scrollbar scrollbar-primary" id="chatMessageWindow">
                            <div id="display_area"></div>
                        </div> 
                        <div class="gap"></div>
                        <form action="" method="post" id="adminChat">
                            <div class="form-group shadow-textarea">
                                <div class="d-flex justify-content-center">
                                    <textarea class="form-control z-depth-1 rounded-pill" style="height: 76px; resize:none; overflow: hidden; max-height: 100px" id="adminMessage" rows="3" placeholder="Write something here..."></textarea>
                                    <div class="h-gap"></div>
                                    <button type="submit" class="btn btn-primary rounded-pill">
                                        <ion-icon name="paper-plane-outline" style="font-size: 1.75rem;"></ion-icon>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
                
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
    $("#adminChat").submit(function(event) {
      event.preventDefault()
      const message = $("#adminMessage").val()

      if (message != '') {
        $.ajax({
          url: "../../save/chat",
          type: "POST",
          data: {
            "_token": "{{ csrf_token() }}",
            "message" : message,
            "type": "A"
          },
          success: function(data){
            $("#adminMessage").val("")
            updateChat()
            var objDiv = document.getElementById("chatMessageWindow");
            objDiv.scrollTop = objDiv.scrollHeight;
          }
        })
      }
    })
    
  })

  function updateChat() {
    
        $.ajax({
            url: "../../show/admin/chat",
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
                    if (element.sender_type == "U" || element.sender_type == "G") { // receiver_type
                        // html += "<div class='message-group-received'>"
                            html += "<div class='message-received'>"
                                html += "<div class='message-received-text'>"
                                    html += element.message
                                html += "</div>"
                            html += "</div>"
                        // html += "</div>"
                    } else {
                        // html += "<div class='message-group-sent'>"
                            html += "<div class='message-sent'>"
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

    $(document).ready(function () {
        $('#example').DataTable({
        "pageLength": 5,
        "dom": 'frtp',
        "pagingType": "numbers",
        order: [[1, 'desc']],
        });
    });

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

    $('#chatTableWindow').on('click', function() {
        const chatTableWindowValue = $("#chatTableWindowValue").val()
        if (chatTableWindowValue == 100) {
            $("#chatTableWindowValue").val(15)
            $("#chatTableWindowCard").attr("style", "max-height: 15%; bottom: 0;");
        } else {
            $("#chatTableWindowValue").val(100)
            $("#chatTableWindowCard").attr("style", "max-height: 100%; bottom: 0;");
        }
    })
</script>