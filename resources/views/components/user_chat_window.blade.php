

<section class="">
    <form action="" method="post" id="userChat">
        <div class="content">
            <div class="StaticChat">
                <input type="hidden" id="chatWindowValue" value="10">
                <div class="card" style="max-height: 7%; bottom: 0;" id="chatWindowCard">
                    <table>
                        <tbody>

                            <tr class='gap'>
                                <td>
                                    <div class="numbers " id="chatWindow" style="font-size: 20px">
                                        @if (Auth::check())
                                            {{ Auth::user()->name }}
                                        @else
                                            Chat
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar scrollbar scrollbar-primary"
                                        id="chatMessageWindow" >
                                        <div id="display_area" ></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="gap"></div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="flex">
                                        <div class="form-group shadow-textarea">

                                            @if (Auth::check())
                                                <input type="hidden" id="userType" value="U">
                                            @else
                                                <input type="hidden" id="userType" value="G">
                                            @endif
                                            <textarea class="form-control" id="userMessage" rows="3" placeholder="Write something here..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary rounded-pill">
                                           send
                                        </button>

                                    </div>

                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </form>
</section>

<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    $(document).ready(function() {
        updateChat()
        $("#display_area").hide();

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
                        "message": message,
                        "type": userType
                    },
                    success: function(data) {
                        console.log(data);
                        $("#userMessage").val("")
                        updateChat()
                        if (elem) {
                            var elem = document.getElementById('chatList');
                            elem.scrollTop = elem.scrollHeight;
                        }
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
                "display": 1,
            },
            success: function(data) {
                html = ""

                data.forEach((element, index) => {
                    if (index > 0) {
                        if (data[index - 1].sender_type != data[index].sender_type) {
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

    $('.gap').on('click', function() {
        const chatWindowValue = $("#chatWindowValue").val()
        if (chatWindowValue == 60) {
            $("#chatWindowValue").val(10)
            $("#chatWindowCard").attr("style", "max-height: 7%; bottom: 0;");
            $("#display_area").hide();
        } else {
            $("#chatWindowValue").val(60)
            $("#chatWindowCard").attr("style", "max-height: fit-content; bottom: 0;");
            $("#display_area").show();
        }
    })
</script>
