<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Change Password</title>
</head>
<body>
    <div class="container py-5">
        <div class="mx-auto col-lg-5">

        
            <h4 class="text-primary-color">Update new password for {{$user->email}}</h4>
            <div class="card shadow">
                
                <div class="card-body">
                    <form action="/forgot-password/change" method="POST">
                        @csrf
                        <input type="text" class="form-control" placeholder="New Password" name="password">
                        <input type="text" class="form-control mt-3" placeholder="Confirm Password" name="password_confirmation">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button class="primary-btn w-100 py-2 mt-3">Confirm</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>