<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Edit Profile</title>
</head>
<body>
    <x-toast></x-toast>
    <x-therapist-nav :active="$active"></x-therapist-nav>
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 g-3 mt-5">
                <div class="col col-lg-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="fw-bold">Profile Picture</h3>
                        </div>
                        <div class="card-body">
                            
                            <div class="text-center">
                                
                                <img id="profile-picture-image" src="
                                <?php
                                    if(auth()->user()->profile_picture == ""){
                                        echo '/empty.jpeg';
                                    }else{
                                        echo '/public/storage/' . auth()->user()->profile_picture;
                                    }
                                ?>
                                
                                " style="height: 200px; width: 200px;" alt="" class="img-cover rounded-circle img-fluid">
                                
                                @error('profile-picture')
                                
                                <x-error-text>{{$message}}</x-error-text>
                                @enderror
                                <br>
                                <form action="/therapist/upload-profile-picture" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <label for="profile-picture-file-upload" style="cursor: pointer" class="px-5 py-2 primary-btn mt-3">Choose File</label>
                                    <input name="profile-picture" type="file" style="display: none" id="profile-picture-file-upload">
                                    <br>
                                    <button class="mt-3 primary-outline-btn py-2">Confirm Profile Picture</button>
                                </form>
                                <script>
                                    $(document).ready(function(){
                                        let profilePicture = $('#profile-picture-file-upload');
                                        let profilePictureImage = $('#profile-picture-image');
                                        profilePicture.on('change', function(e){
                                            let file = e.target.files[0];
                                            var reader = new FileReader();

                                            reader.onload = function(e){
                                                profilePictureImage.attr('src', e.target.result)
                                            }
                                            reader.readAsDataURL(file)
                                        })
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col col-lg-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="fw-bold">Basic Information</h3>
                        </div>
                        <div class="card-body">
                            <form action="/therapist/update-profile" method="POST">
                                @csrf
                                <div class="row row-cols-1 row-cols-lg-2 g-3">
                                    <div class="col">
                                        <label class="form-label">First Name</label>
                                        <input name="first_name" type="text" class="form-control" value="{{auth()->user()->first_name}}" placeholder="">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Last Name</label>
                                        <input name="last_name" type="text" class="form-control" value="{{auth()->user()->last_name}}" placeholder="">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Contact Number</label>
                                        <input name="contact_number" type="number" class="form-control" value="{{auth()->user()->contact_number}}" placeholder="">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Date of Birth</label>
                                        <input name="birth_date" type="date" class="form-control" value="{{auth()->user()->birth_date}}" placeholder="">
                                
                                    </div>
                                </div>
                                
                                
                                
                                
                                <button class="primary-btn w-100 py-2 mt-3">Confirm</button>
                            </form>
                            
                            
                        </div>
                    </div>
                    <div class="card shadow mt-4">
                        <div class="card-header">
                            <h3 class="fw-bold">Change Password</h3>
                            
                        </div>
                        <div class="card-body">
                            <form action="/change-password" method="POST">
                                @csrf
                                <div class="row row-cols-1 row-cols-lg-3">
                                    <div class="col">
                                        <label for="" class="form-label">Current Password</label>
                                        <input name="current-password" type="password" class="form-control">
                                        @error('current-password')
                                        <x-error-text>{{$message}}</x-error-text>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">New Password</label>
                                        <input name="new-password" type="password" class="form-control">
                                        @error('new-password')
                                        <x-error-text>{{$message}}</x-error-text>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Confirm New Password</label>
                                        <input name="new-password_confirmation" type="password" class="form-control">
                                        @error('new-password_confirmation')
                                        <x-error-text>{{$message}}</x-error-text>
                                        @enderror
                                    </div>
                                </div>
                                <button class="mt-3 w-100 py-2 primary-btn">Confirm</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            
           
        </div>
    </body>
</html>