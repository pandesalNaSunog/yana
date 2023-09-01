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
        <div class="card mt-5 mx-auto shadow col col-lg-4">
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
</body>
</html>