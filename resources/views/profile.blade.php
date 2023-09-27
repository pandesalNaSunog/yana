<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | My Profile</title>
</head>
<body>
    <x-client-nav></x-client-nav>
    <x-toast></x-toast>
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2 g-3 mt-5">
            <div class="col col-lg-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img class="img-fluid img-cover rounded-circle" style="height: 200px; width: 200px" src="
                                <?php
                                    if(auth()->user()->profile_picture == ""){
                                        echo '/yana/empty.jpeg';
                                    }else{
                                        echo '/yana/public/storage/' . auth()->user()->profile_picture;
                                    }
                                ?>
                                
                                " alt="">
                        <h3 class="fw-bold mt-3">{{auth()->user()->first_name . " " . auth()->user()->last_name}}</h3>
                        <p class="m-0"><em>{{auth()->user()->email}}</em></p>
                        <a href="/yana/edit-profile"><button class="mt-4 primary-btn px-5 py-2">Edit Profile</button></a>
                        <hr>
                    </div>
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
                                    <th scope="col">Therapist Name</th>
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
                                                {{$onlineSession['therapist_name']}}
                                            </td>
                                            <td>
                                                {{$onlineSession['submission_date']}}
                                            </td>
                                            <td>
                                                {{$onlineSession['status']}}
                                            </td>
                                            <td>
                                                @if($onlineSession['status'] == "Ongoing")
                                                <a href="/yana/chats/convo/{{$onlineSession['chat_id']}}"><button class="primary-btn py-2 px-5">View Conversation</button></a>
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
        
    </div>
</body>
</html>