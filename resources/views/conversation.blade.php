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
    <x-admin-nav></x-admin-nav>
    @elseif(auth()->user()->role == 1)
    <x-therapist-nav></x-therapist-nav>
    @else
    <x-client-nav></x-client-nav>
    @endif
    
    <div class="d-flex h-100">
        <div class="col col-lg-3">
            <div class="card h-100" style="border-radius: 0; overflow: overlay">
                @foreach($chatData as $key => $chat)
                <a href="/yana/chats/convo/{{$chats[$key]->id}}" style="text-decoration: none">
                    <div class="card" style="border-left: none; border-right: none; border-radius: 0; border-top: none">
                        <div class="card-body">
                            <div class="row row-cols-3">
                                
                                <div class="col-3 text-center">
                                    @if($chat['image'] != "/empty.jpeg")
                                    <img src="/yana/public/storage/{{$chat['image']}}" style="height: 50px; width: 50px; object-fit: cover" class="rounded-circle" alt="">
                                    @else
                                    <img src="/yana/{{$chat['image']}}" style="height: 50px; width: 50px; object-fit: cover" class="rounded-circle" alt="">
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
            <div class="row row-cols-2 g-2 p-4" style="overflow: overlay; height: 92vh">

                @foreach($messageData as $messageDatum)
                    @if($messageDatum['mine'] == 0)
                    <!-- for receivers message -->
                    <div class="col-1">
                        <img src="/yana/{{$messageDatum['image']}}" alt="" class="img-fluid rounded-circle" style="height: 50px; width: 50px; object-fit:cover">
                    </div>
                    <div class="col-11">
                        <div class="card shadow message-box">
                            <div class="card-body">
                                {{$messageDatum['message']}}
                            </div>
                        </div>
                        <p class="text-secondary fs-6"><small>{{$messageDatum['date_time']}}</small></p>
                    </div>
                    @else
                    <!-- for senders message -->
                    <div class="col-11">
                        <div class="card bg-primary message-box shadow ms-auto">
                            <div class="card-body text-light text-end">
                                {{$messageDatum['message']}}
                            </div>
                        </div>
                        <p class="text-secondary fs-6 text-end"><small>{{$messageDatum['date_time']}}</small></p>
                    </div>
                    <div class="col-1 text-end">
                        
                        <img src="/yana/{{$messageDatum['image']}}" alt="" class="img-fluid rounded-circle" style="height: 50px; width: 50px; object-fit:cover">
                    </div>
                    @endif
                @endforeach
            </div>
            <?php
                if(!empty($chatData)){
                    
                    $chatId = $chatData[0]['chat_id'];
                    $receiverId = $chatData[0]['receiver_id'];
                ?>
                    <div class="card" id="write-message">
                        <div class="card-body" >
                            <div class="input-group">
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
                                                    chat_id: '{{$chatId}}',
                                                    message: message.val(),
                                                    receiver_id: '{{$receiverId}}'
                                                },
                                                success: function(response){
                                                    if(response == 'ok'){
                                                        message.val('');
                                                    }
                                                }
                                            })
                                        }
                                        
                                    })

                                })
                            </script>
                        </div>
                    </div>
                <?php
                }
                ?>
            
        </div>
    </div>
</body>
</html>