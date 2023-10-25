<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA Administrator | Log In</title>
</head>
<body>

    <div class="container">
        <div class="col col-lg-4 mx-auto mt-5">
            <div class="card shadow">
                <div class="card-body">
                    <form action="/yana/admin/login" method="POST">
                        @csrf
                        <input type="text" name="email" placeholder="Email" class="form-control">
                        @error('email')
                            <x-error-text>{{$message}}</x-error-text>
                        @enderror
                        <input type="password" name="password" placeholder="Password" class="mt-2 form-control">
                        @error('password')
                            <x-error-text>{{$message}}</x-error-text>
                        @enderror
                        <button class="primary-btn w-100 py-3 fw-bold mt-2">Log In</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>