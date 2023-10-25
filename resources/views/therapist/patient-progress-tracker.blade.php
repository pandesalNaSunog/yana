<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Progress Tracker</title>
</head>
<body>
    <x-therapist-nav :active="$active"></x-therapist-nav>

    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="fw-bold">Patient Information</h4>
            </div>
            <div class="card-body">
                <div class="ms-3">
                    <h3 class="fw-bold">{{$user->first_name . " " . $user->last_name}}</h3>
                    <p class="m-0">{{$user->contact_number}}</p>
                    <p class="m-0"><em>{{$user->email}}</em></p>
                </div>
                
            </div>
        </div>


        <div class="card shadow mt-3">
                <div class="card-header">
                    <h3 class="fw-bold">Progress Tracker</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-lg-2 g-3">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4 class="fw-bold">Anxiety</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="anxiety-chart" style="width: 100%; height: 40vh"></canvas>
                                    <script>
                                        const anxietyValues = <?php echo json_encode($evaluation_dates) ?>;

                                        new Chart("anxiety-chart", {
                                        type: "line",
                                        data: {
                                            labels: anxietyValues,
                                            datasets: [
                                                { 
                                                    data: <?php echo json_encode($anxiety) ?>,
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
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4 class="fw-bold">Depression</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="depression-chart" style="width: 100%; height: 40vh"></canvas>
                                    <script>
                                        const depressionValues = <?php echo json_encode($evaluation_dates) ?>;

                                        new Chart("depression-chart", {
                                        type: "line",
                                        data: {
                                            labels: depressionValues,
                                            datasets: 
                                            [
                                                { 
                                                    data: <?php echo json_encode($depression) ?>,
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
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4 class="fw-bold">Stress</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="stress-chart" style="width: 100%; height: 40vh"></canvas>
                                    <script>
                                        const stressValues = <?php echo json_encode($evaluation_dates) ?>;

                                        new Chart("stress-chart", {
                                        type: "line",
                                        data: {
                                            labels: stressValues,
                                            datasets: 
                                            [
                                                { 
                                                    data: <?php echo json_encode($stress) ?>,
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
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4 class="fw-bold">Sleep Disturbances</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="sleep-chart" style="width: 100%; height: 40vh"></canvas>
                                    <script>
                                        const sleepValues = <?php echo json_encode($evaluation_dates) ?>;

                                        new Chart("sleep-chart", {
                                        type: "line",
                                        data: {
                                            labels: sleepValues,
                                            datasets: 
                                            [
                                                { 
                                                    data: <?php echo json_encode($sleep_disturbances) ?>,
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
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4 class="fw-bold">Mood</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="mood-chart" style="width: 100%; height: 40vh"></canvas>
                                    <script>
                                        const moodValues = <?php echo json_encode($evaluation_dates) ?>;

                                        new Chart("mood-chart", {
                                        type: "line",
                                        data: {
                                            labels: moodValues,
                                            datasets: 
                                            [
                                                { 
                                                    data: <?php echo json_encode($mood) ?>,
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
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h4 class="fw-bold">Progress</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="progress-chart" style="width: 100%; height: 40vh"></canvas>
                                    <script>
                                        const progressValues = <?php echo json_encode($evaluation_dates) ?>;

                                        new Chart("progress-chart", {
                                        type: "line",
                                        data: {
                                            labels: progressValues,
                                            datasets: 
                                            [
                                                { 
                                                    data: <?php echo json_encode($progress) ?>,
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
                    </div>
                </div>
            </div>
    </div>
</body>
</html>