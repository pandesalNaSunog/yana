<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>Success</title>
</head>
<body>

    <div class="container py-5">
        <div class="col-lg-5 col text-center mx-auto">
            <img src="/envelope.png" style="width: 300px; height: auto" class="img-fluid" alt="">
            <h1 class="text-primary-color">Your submission has been successfull!</h1>
            <p class="text-primary-color">We will send you an email for confirmation</p>
            <h3 class="text-primary-color">Tracking Code: {{$tracking_number}}</h3>
            <a href="/"><button class="primary-btn mt-3 px-5 py-2">Home</button></a>
        </div>
    </div>
    
</body>
</html>