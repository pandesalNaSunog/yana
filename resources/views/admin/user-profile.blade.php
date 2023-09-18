<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Administrator | User Profile</title>
</head>
<body>
    <x-admin-nav></x-admin-nav>
    <x-toast></x-toast>
    <div class="container">
        <div class="card shadow mt-5 mx-auto col col-lg-4">
            <div class="card-header">
                <h3 class="fw-bold">
                    @if($user->role == 1)
                    Therapist Credentials
                    @else
                    User Profile
                    @endif
                </h3>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <h3 class="fw-bold">{{$user->first_name. " " . $user->last_name}}</h3>
                    <p class="m-0"><small><em>{{$user->email}}</em></small></p>
                    <p class="m-0"><small><em>{{$user->degree}}</em></small></p>
                    <hr>
                    @if($user->role == 1)
                        <div class="text-start">
                            <p class="fw-bold">Certification:</p>
                            <img src="/public/storage/{{$user->certification}}" class="img-fluid img-contain" style="height:auto; width: 100%" alt="">
                            
                        </div>

                    
                        @if($user->approval == 0)
                        <form action="/admin/approve-therapist" method="POST">
                            @csrf
                            <input type="hidden" value="{{$user->id}}" name="therapist-id">
                            <button class="primary-btn w-100 py-2 mt-3">Approve Therapist</button>
                        </form>
                        @else
                        <p class="m-0 mt-3"><em>This therapist has already been approved</em></p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>