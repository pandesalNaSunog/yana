<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Therapist List</title>
</head>
<body>
    <x-client-nav></x-client-nav>

    <div class="container py-5">
        <h2 class="fw-bold text-center">Our Psychologists</h2>
        <div class="row row-cols-1 row-cols-lg-4 g-3">
            @foreach($therapists as $therapist)
            <div class="col">
                <div class="card shadow">
                    @if($therapist->profile_picture != "")
                    <img src="/yana/public/storage/{{$therapist->profile_picture}}" class="card-img-top" style="height: 300px; width: 100%; object-fit: cover; object-position: top;"></img>
                    @else
                    <img src="/yana/empty.jpeg" class="card-img-top" style="height: 300px; width: 100%; object-fit: cover; object-position: top;"></img>
                    @endif
                    <div class="card-body">
                        <h3 class="fw-bold">{{$therapist->first_name . " " . $therapist->last_name}}</h3>
                        <p>{{$therapist->bio}}</p>
                        <form action="/yana/post-matcher" method="POST">
                            @csrf
                            <input type="hidden" value="{{$therapist->id}}" name="therapist_id">
                            <button class="px-5 py-2 primary-btn">Get Matched Now</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>