<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Chats</title>
</head>
<body class="vh-100">
    @if(auth()->user()->role == 0)
    <x-admin-nav></x-admin-nav>
    @elseif(auth()->user()->role == 1)
    <x-therapist-nav></x-therapist-nav>
    @else
    <x-client-nav></x-client-nav>
    @endif

    <div class="d-flex h-100">
        <div class="col col-lg-3">
            <div class="card h-100" style="border-radius: 0; overflow: overlay">
                <div class="card" style="border-left: none; border-right: none; border-radius: 0; border-top: none">
                    <div class="card-body">
                        <div class="row row-cols-3">
                            <div class="col-3 text-center">
                                <img src="/empty.jpeg" style="height: 50px; width: 50px; object-fit: cover" class="rounded-circle" alt="">
                            </div>
                            <div class="col-6">
                                <p class="fw-bold m-0 fs-6"><small>Lorem, ipsum dolor.</small></p>
                                <p class="m-0 text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat repellat cumque molestiae dicta adipisci ab molestias, maxime maiores veritatis ut saepe debitis. Temporibus qui hic fugiat deleniti accusantium dolores ipsum?</p>
                            </div>
                            <div class="col-3 text-end">
                                <p class="lead text-secondary fs-6"><small>3:58 PM</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-lg-9">
            <div class="card h-100" style="border-radius: 0">

            </div>
        </div>
    </div>
</body>
</html>