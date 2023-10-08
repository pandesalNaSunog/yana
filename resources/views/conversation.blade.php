<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Chats</title>
</head>
<body>
    @if(auth()->user()->role == 0)
    <x-admin-nav :active="$active"></x-admin-nav>
    @elseif(auth()->user()->role == 1)
    <x-therapist-nav :active="$active"></x-therapist-nav>
    @else
    <x-client-nav :active="$active"></x-client-nav>
    @endif


    <div class="modal fade" id="conversation-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Messages</h1>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @foreach($chatData as $key => $chat)
                    <a href="/chats/convo/{{$chats[$key]->id}}" style="text-decoration: none">
                        <div class="card" style="border-left: none; border-right: none; border-radius: 0; border-top: none">
                            <div class="card-body">
                                <div class="row row-cols-3">
                                    
                                    <div class="col-3 text-center">
                                        <!-- @if($chat['image'] != "empty.jpeg")
                                        <img src="public/storage/{{$chat['image']}}" style="height: 50px; width: 50px; object-fit: cover" class="rounded-circle" alt="">
                                        @else
                                        <img src="{{$chat['image']}}" style="height: 50px; width: 50px; object-fit: cover" class="rounded-circle" alt="">
                                        @endif -->
                                    </div>
                                    <div class="col-6">
                                        <p class="fw-bold m-0 fs-6"><small>{{$chat['name']}}</small></p>
                                        <p class="m-0 text-truncate">{{$chat['latest_message']}}</p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <p class="lead text-secondary fs-6"><small>{{$chat['time']}}</small></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div class="d-flex h-100">
        <div class="col col-lg-3 d-none d-lg-block">
            <div class="card h-100" style="border-radius: 0; overflow: overlay">
                @foreach($chatData as $key => $chat)
                <a href="/chats/convo/{{$chats[$key]->id}}" style="text-decoration: none">
                    <div class="card" style="border-left: none; border-right: none; border-radius: 0; border-top: none">
                        <div class="card-body">
                            <div class="row row-cols-3">
                                
                                <div class="col-3 text-center">
                                    @if($chat['image'] != "/empty.jpeg")
                                    <img src="/public/storage/{{$chat['image']}}" style="height: 50px; width: 50px; object-fit: cover" class="rounded-circle" alt="">
                                    @else
                                    <img src="/{{$chat['image']}}" style="height: 50px; width: 50px; object-fit: cover" class="rounded-circle" alt="">
                                    @endif
                                </div>
                                <div class="col-6">
                                    <p class="fw-bold m-0 fs-6"><small>{{$chat['name']}}</small></p>
                                    <p class="m-0 text-truncate">{{$chat['latest_message']}}</p>
                                </div>
                                <div class="col-3 text-end">
                                    <p class="lead text-secondary fs-6"><small>{{$chat['time']}}</small></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </a>
                
                @endforeach
            </div>
        </div>
        <div class="col col-lg-9">
            <div class="row row-cols-2 g-2 p-4" id="conversation-box" style="overflow: overlay; height: 92vh">
                
                @foreach($messageData as $messageDatum)
                    @if($messageDatum['mine'] == 0)
                    <!-- for receivers message -->
                    <div class="col-2 col-md-1">
                        <img src="/{{$messageDatum['image']}}" alt="" class="img-fluid rounded-circle" style="height: 50px; width: 50px; object-fit:cover">
                    </div>
                    <div class="col-10 col-md-11">
                        <div class="card shadow message-box">
                            <div class="card-body">
                                {{$messageDatum['message']}}
                            </div>
                        </div>
                        <p class="text-secondary fs-6"><small>{{$messageDatum['date_time']}}</small></p>
                    </div>
                    @else
                    <!-- for senders message -->
                    <div class="col-10 col-md-11">
                        <div class="card bg-primary message-box shadow ms-auto">
                            <div class="card-body text-light text-end">
                                {{$messageDatum['message']}}
                            </div>
                        </div>
                        <p class="text-secondary fs-6 text-end"><small>{{$messageDatum['date_time']}}</small></p>
                    </div>
                    <div class="col-2 col-md-1 text-end">
                        
                        <img src="/{{$messageDatum['image']}}" alt="" class="img-fluid rounded-circle" style="height: 50px; width: 50px; object-fit:cover">
                    </div>
                    @endif
                @endforeach
                
            </div>
            
                    <div class="card" id="write-message">
                        <div class="card-body" >
                            <div class="input-group" id="message-input-group">
                                <textarea required id="message" placeholder="Write Your Message Here..." class="w-75 form-control"></textarea>
                                
                                <button id="send-message" class="primary-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                    </svg>
                                </button>
                                
                            </div>
                            <p class="m-0 small text-danger" id="message-error"></p>
                            <script>

                                
                                $(document).ready(function(){
                                    
                                    let message = $('#message');
                                    let sendMessage = $('#send-message');
                                    let messageError = $('#message-error');
                                    let conversationBox = $('#conversation-box');
                                    let messageInputGroup = $('#message-input-group');
                                    messageInputGroup.keydown(function(e){
                                        if(e.keyCode == 13){
                                            if(!e.shiftKey){
                                                e.preventDefault();
                                                sendMessage.click();
                                            }
                                            
                                        }
                                    })
                                    scrollToBottomConversation(conversationBox);
                                    messageError.hide();
                                    message.keydown(function(){
                                        messageError.hide();
                                    });
                                    sendMessage.click(function(){
                                        if(message.val() == ''){
                                            messageError.text('Please fill out this field');
                                            messageError.show();
                                        }else{
                                            $.ajax({
                                                type: 'POST',
                                                url: "{{route('send-message')}}",
                                                data:{
                                                    chat_id: '{{$chat_id}}',
                                                    message: message.val(),
                                                    receiver_id: '{{$receiver_id}}'
                                                },
                                
                                                success: function(messageData){
                                                    
                                                    
                                                    displaySentMessage(messageData.image,messageData.chat_id, messageData.id, messageData.message, messageData.receiver_id, messageData.sender_id, messageData.created_at);
                                                    scrollToBottomConversation(conversationBox);
                                                    message.val('');
                                                }
                                            })
                                        }
                                        
                                    })
                                    function scrollToBottomConversation(conversationBox){
                                        conversationBox.animate({
                                            scrollTop: conversationBox.prop('scrollHeight')
                                        },'slow');
                                    }
                                    function displaySentMessage(image,chatId, id, message, receiverId, senderId, createdAt){
                                        conversationBox.append(`<div class="col-10 col-md-11">
                                            <div class="card bg-primary message-box shadow ms-auto">
                                                <div class="card-body text-light text-end">
                                                    ${message}
                                                </div>
                                            </div>
                                            <p class="text-secondary fs-6 text-end"><small>${createdAt}</small></p>
                                        </div>
                                        <div class="col-2 col-md-1 text-end">
                                            
                                            <img src="${image}" alt="" class="img-fluid rounded-circle" style="height: 50px; width: 50px; object-fit:cover">
                                        </div>`)
                                    }
                                })
                            </script>
                        </div>
                    </div>
               
            
        </div>
    </div>
</body>
</html>