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
        <div class="row row-cols-1 row-cols-lg-2 g-3">
            <div class="col col-lg-5">
                <div class="row row-cols-1 row-cols-lg-2 g-3">
                    <div class="col">
                        <div class="card shadow" style="border: none">
                            <div class="card-body">
                                <h4 class="text-primary-color">Patients</h4>
                                <h1 class="fw-bold fs-1 py-5" style="font-size: 70px!important;">{{$patients}}</h1>
                                @if($patient_rate_of_increase < 1)
                                <p class="text-danger">-{{$patient_rate_of_increase . "% for the month of " . date('F')}}</p>
                                @else
                                <p class="text-success">+{{$patient_rate_of_increase . "% for the month of " . date('F')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow" style="border: none">
                            <div class="card-body">
                                <h4 class="text-primary-color">Therapists</h4>
                                <h1 class="fw-bold fs-1 py-5" style="font-size: 70px!important;">{{$therapists}}</h1>
                                @if($therapist_rate_of_increase < 1)
                                <p class="text-danger">-{{$therapist_rate_of_increase . "% for the month of " . date('F')}}</p>
                                @else
                                <p class="text-success">+{{$therapist_rate_of_increase . "% for the month of " . date('F')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow" style="border: none">
                            <div class="card-body">
                                <h4 class="text-primary-color">Feedbacks</h4>
                                <h1 class="fw-bold fs-1 py-5" style="font-size: 70px!important;">{{$feedbacks}}</h1>
                                @if($feedback_rate_of_increase < 1)
                                <p class="text-danger">-{{$feedback_rate_of_increase . "% for the month of " . date('F')}}</p>
                                @else
                                <p class="text-success">+{{$feedback_rate_of_increase . "% for the month of " . date('F')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow" style="border: none">
                            <div class="card-body">
                                <h4 class="text-primary-color">Forum Posts</h4>
                                <h1 class="fw-bold fs-1 py-5" style="font-size: 70px!important;">{{$posts}}</h1>
                                @if($post_rate < 1)
                                <p class="text-danger">-{{$post_rate . "% for the month of " . date('F')}}</p>
                                @else
                                <p class="text-success">+{{$post_rate . "% for the month of " . date('F')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow" style="border: none">
                            <div class="card-body">
                                <h4 class="text-primary-color">Comments Per Post (Avg.)</h4>
                                <h1 class="fw-bold fs-1 py-5" style="font-size: 70px!important;">{{$average_comments}}</h1>
                                @if($comment_rate < 1)
                                <p class="text-danger">-{{$comment_rate . "% for the month of " . date('F')}}</p>
                                @else
                                <p class="text-success">+{{$comment_rate . "% for the month of " . date('F')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow" style="border: none">
                            <div class="card-body">
                                <h4 class="text-primary-color">Consultations</h4>
                                <h1 class="fw-bold fs-1 py-5" style="font-size: 70px!important;">{{$consultations}}</h1>
                                @if($consultation_rate < 1)
                                <p class="text-danger">-{{$consultation_rate . "% for the month of " . date('F')}}</p>
                                @else
                                <p class="text-success">+{{$consultation_rate . "% for the month of " . date('F')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-7">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>