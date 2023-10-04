<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Forgot Password</title>
</head>
<body>
    <div class="container">
        <div class="mx-auto col-lg-5 my-5">
            <h4 class="text-center text-primary-color">Please enter your email below</h4>
            <div class="card shadow">
                <div class="card-body text-center">
                    <form action="/forgot-password" method="POST">
                        @csrf
                        <input type="text" name="email" placeholder="Email" class="form-control">
                        <button class="primary-btn w-100 py-2 mt-3">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>