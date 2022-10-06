<section class="UserChat">
    <div class="content">
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
    </div>

</section>

<script src="{{ asset('js/jquery.js') }}"></script>
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
