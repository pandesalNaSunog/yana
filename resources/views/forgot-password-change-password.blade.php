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
        <div class="card shadow mx-auto col-lg-5">
            <div class="card-body">
                <form action="/forgot-password/change" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="password">
                    <input type="text" class="form-control mt-3" name="password_confirmation">
                    <button class="primary-btn w-100 py-2">Confirm</button>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>