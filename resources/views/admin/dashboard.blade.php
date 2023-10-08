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
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Patients</h4>
                        <h1 class="fw-bold fs-1 " style="font-size: 40px!important;">{{$patients}}</h1>
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
                        <h1 class="fw-bold fs-1 " style="font-size: 40px!important;">{{$therapists}}</h1>
                        <small>
                        @if($therapist_rate_of_increase < 1)
                        <p class="text-danger">-{{$therapist_rate_of_increase . "% for the month of " . date('F')}}</p>
                        @else
                        <p class="text-success">+{{$therapist_rate_of_increase . "% for the month of " . date('F')}}</p>
                        @endif
</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Feedbacks</h4>
                        <h1 class="fw-bold fs-1 " style="font-size: 40px!important;">{{$feedbacks}}</h1>
                        <small>
                        @if($feedback_rate_of_increase < 1)
                        <p class="text-danger">-{{$feedback_rate_of_increase . "% for the month of " . date('F')}}</p>
                        @else
                        <p class="text-success">+{{$feedback_rate_of_increase . "% for the month of " . date('F')}}</p>
                        @endif
</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Forum Posts</h4>
                        <h1 class="fw-bold fs-1 " style="font-size: 40px!important;">{{$posts}}</h1>
                        <small>
                        @if($post_rate < 1)
                        <p class="text-danger">-{{$post_rate . "% for the month of " . date('F')}}</p>
                        @else
                        <p class="text-success">+{{$post_rate . "% for the month of " . date('F')}}</p>
                        @endif
</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Comments Per Post (Avg.)</h4>
                        <h1 class="fw-bold fs-1 " style="font-size: 40px!important;">{{$average_comments}}</h1>
                        <small>
                        @if($comment_rate < 1)
                        <p class="text-danger">-{{$comment_rate . "% for the month of " . date('F')}}</p>
                        @else
                        <p class="text-success">+{{$comment_rate . "% for the month of " . date('F')}}</p>
                        @endif
</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Consultations</h4>
                        <h1 class="fw-bold fs-1 " style="font-size: 40px!important;">{{$consultations}}</h1>
                        <small>
                        @if($consultation_rate < 1)
                        <p class="text-danger">-{{$consultation_rate . "% for the month of " . date('F')}}</p>
                        @else
                        <p class="text-success">+{{$consultation_rate . "% for the month of " . date('F')}}</p>
                        @endif
</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mt-4" style="border: none">
            <div class="card-body">
                <canvas id="consultations-chart" style="width: 100%; heigh"></canvas>
                
                <script>
                const xValues = [100,200,300,400,500,600,700,800,900,1000];

                new Chart("consultations-chart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [
                        { 
                            data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
                            borderColor: "red",
                            fill: false
                        }, 
                        { 
                            data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
                            borderColor: "green",
                            fill: false
                        }, 
                        { 
                            data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
                            borderColor: "blue",
                            fill: false
                        }
                    ]
                },
                options: {
                    legend: {display: false}
                }
                });
                </script>
            </div>
        </div>
    </div>
        
</body>
</html>