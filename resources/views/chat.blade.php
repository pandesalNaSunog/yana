<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Chats</title>
</head>
<body class="vh-100">
    @if(auth()->user()->role == 0)
    <x-admin-nav :$active="$active"></x-admin-nav>
    @elseif(auth()->user()->role == 1)
    <x-therapist-nav :$active="$active"></x-therapist-nav>
    @else
    <x-client-nav :active="$active"></x-client-nav>
    @endif
    
    <div class="d-flex h-100">
        <div class="col col-lg-3">
            <div class="card h-100" style="border-radius: 0; overflow: overlay">
                @foreach($chatData as $chat)
                <a href="/chats/convo/{{$chat['chat_id']}}" style="text-decoration: none">
                    <div class="card" style="border-left: none; border-right: none; border-radius: 0; border-top: none">
                        <div class="card-body">
                            <div class="row row-cols-3">
                                
                                <div class="col-3 text-center">
                                    @if($chat['image'] != "/empty.jpeg")
                                    <img src="/public/storage/{{$chat['image']}}" style="height: 50px; width: 50px; object-fit: cover" class="rounded-circle" alt="">
                                    @else
                                    <img src="{{$chat['image']}}" style="height: 50px; width: 50px; object-fit: cover" class="rounded-circle" alt="">
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
        </div>
    </div>
</body>
</html>