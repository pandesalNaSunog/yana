<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Dashboard</title>
</head>
<body>
    <x-therapist-nav></x-therapist-nav>
    <x-toast></x-toast>
    <div class="modal fade" id="edit-bio-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h4 class="fw-bold">Edit Bio</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form action="/therapist/update-bio" method="POST">
                        @csrf
                        <input required type="text" placeholder="Bio" name="bio" value="{{auth()->user(}->bio}" class="form-control">
                        <button class="primary-btn w-100 mt-3">Confirm</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2 mt-5 g-3">
            <div class="col col-lg-4">
                <div class="card mx-auto shadow">
                    <div class="card-body text-center">
                        <img class="img-fluid img-cover rounded-circle" style="height: 200px; width: 200px" src="
                                <?php
                                    if(auth()->user()->profile_picture == ""){
                                        echo '/empty.jpeg';
                                    }else{
                                        echo '/public/storage/' . auth()->user()->profile_picture;
                                    }
                                ?>
                                
                                " alt="">
                        <h3 class="fw-bold mt-3">{{auth()->user()->first_name . " " . auth()->user()->last_name}}</h3>
                        <p class="m-0"><em>{{auth()->user()->email}}</em></p>
                        <a href="/therapist/edit-profile"><button class="mt-4 primary-btn px-5 py-2">Edit Profile</button></a>
                        <hr>
                    </div>
                    @if(auth()->user()->bio == "")
                    <p class="m-0 text-center"><i>"No bio"</i></p>
                    @else
                    <p class="m-0 text-center"><i>{{auth()->user()->bio}}</i></p>
                    <button class="primary-btn mt-3 w-100" data-bs-toggle="modal" data-bs-target="#edit-bio-modal">Edit Bio</button>
                </div>
                
            </div>
            <div class="col col-lg-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="fw-bold">My Online Sessions</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th scope="col">Name</th>
                                    <th scope="col">Submission Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody>
                                   
                                    
                                    
                                    
                                
                                        @foreach($onlineSessions as $onlineSession)
                                        <tr>
                                            <td>
                                                {{$onlineSession['name']}}
                                            </td>
                                            <td>
                                                {{$onlineSession['submission_date']}}
                                            </td>
                                            <td>
                                                {{$onlineSession['status']}}
                                            </td>
                                            <td>
                                                @if($onlineSession['status'] == "Pending")
                                                <form action="/therapist/confirm-session" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="matcher_id" value="{{$onlineSession['matcher_id']}}">
                                                    <button class="primary-btn px-5 py-2">Confirm</button>
                                                </form>
                                                @else
                                                <a href="/chats/convo/{{$onlineSession['chat_id']}}"><button class="primary-btn px-5 py-2">View Conversation</button></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                </tbody>
                            </table>
                            @if(empty($onlineSessions))
                            <p class="text-center fw-bold text-secondary p-5">No Online Sessions</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="py-4">
                    {{$matchers->links()}}
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>