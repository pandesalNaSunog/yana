<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Log In</title>
</head>
<body class="vh-100">
    <x-toast></x-toast>
    <img src="/bilog.png" style="height: 75vh; width: auto; position: absolute; left: -400px; margin-top: 50px;" alt="">
    <img src="/bilog with stripe.png" style="height: 75vh; width: auto; position: absolute; right: -400px; margin-top: -300px; rotate: 40deg" alt="">
    <div class="container h-100 d-flex align-items-center">
        <div class="mx-auto col col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <form action="/login" method="POST">
                        @csrf
                        <input value="{{old('email')}}" name="email" type="email" placeholder="Email" class="form-control">
                        @error('email')
                        <x-error-text>{{$message}}</x-error-text>
                        @enderror
                        <input name="password" type="password" placeholder="Password" class="form-control mt-3">
                        @error('password')
                        <x-error-text>{{$message}}</x-error-text>
                        @enderror
                        
                        
                        <button class="primary-btn w-100 py-3 mt-3">Log In</button>
                    </form>
                    <a href="/forgot-password"><button class="btn btn-link">Forgot Password?</button></a>
                </div>
            </div>

            <div class="text-center">
                <p class="m-0 text-secondary mt-5">Don't have an account? <a href="/signup">Sign Up</a></p>
            </div>
        </div>
        
    </div>
    
</body>
</html>