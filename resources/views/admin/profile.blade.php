<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA Administrator | Profile</title>
</head>
<body>
    <x-admin-nav>
    </x-admin-nav>
    <x-toast></x-toast>

    <div class="container my-5">
        <div class="card shadow col-lg-5 mx-auto">
            <div class="card-header">
                <h4 class="fw-bold">
                    Change Password
                </h4>
            </div>
            <div class="card-body">
                <form action="/yana/change-password" method="POST">
                    @csrf
                
                    <label class="form-label">Current Password</label>
                    <input type="password" name="current-password" class="form-control">
                    @error('current-password')
                    <x-error-text>{{$message}}</x-error-text>
                    @enderror
                    <label class="form-label">New Password</label>
                    <input type="password" name="new-password" class="form-control">
                    @error('new-password')
                    <x-error-text>{{$message}}</x-error-text>
                    @enderror
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="new-password_confirmation" class="form-control">
                    @error('password_confirmation')
                    <x-error-text>{{$message}}</x-error-text>
                    @enderror
                    <button class="mt-3 w-100 primary-btn py-2">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>