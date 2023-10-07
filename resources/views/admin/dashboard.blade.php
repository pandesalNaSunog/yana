<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA Administrator | Dashboard</title>
</head>
<body class="bg-light">

    <x-admin-nav :active="$active"></x-admin-nav>
    
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-2 g-3">
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Patients</h4>
                        <h1 class="fw-bold fs-1">{{$patients}}</h1>
                        @if($patient_rate_of_increase < 1)
                        <p class="text-danger">-{{$patient_rate_of_increase . "%"}}</p>
                        @else
                        <p class="text-success">+{{$patient_rate_of_increase . "%"}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Therapists</h4>
                        <h1 class="fw-bold fs-1">{{$therapists}}</h1>
                        @if($therapist_rate_of_increase < 1)
                        <p class="text-danger">-{{$therapist_rate_of_increase . "%"}}</p>
                        @else
                        <p class="text-success">+{{$therapist_rate_of_increase . "%"}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Feedbacks</h4>
                        <h1 class="fw-bold fs-1">{{$feedbacks}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>