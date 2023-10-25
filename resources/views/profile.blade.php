<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | My Profile</title>
</head>
<body class="bg-light">
    <x-client-nav :active="$active"></x-client-nav>
    <x-toast></x-toast>
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-lg-2 g-3">
            <div class="col col-lg-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img class="img-fluid img-cover rounded-circle" style="height: 200px; width: 200px" src="
                                <?php
                                    if(auth()->user()->profile_picture == ""){
                                        echo '/empty.jpeg';
                                    }else{
                                        echo '/public/storage/' . auth()->user()->profile_picture;
                                    }
                                ?>
                                
                                " alt="">
                        <h3 class="fw-bold mt-3">{{auth()->user()->first_name . " " . auth()->user()->last_name}}</h3>
                        <p class="m-0"><em>{{auth()->user()->email}}</em></p>
                        <a href="/edit-profile"><button class="mt-4 primary-btn px-5 py-2">Edit Profile</button></a>
                        <hr>
                    </div>
                </div>
                <a href="/evaluation-form"><button class="mt-3 w-100 py-2 primary-btn">Take Progress Tracking Examination</button></a>
            </div>
            <div class="col col-lg-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="fw-bold">My Online Sessions</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th scope="col">Name</th>
                                    <th scope="col">Therapist Name</th>
                                    <th scope="col">Submission Date</th>
                                    <th scope="col">Tracking Code</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody>
                                
                                        @foreach($onlineSessions as $onlineSession)
                                        <tr>
                                            <td>
                                                {{$onlineSession['name']}}
                                            </td>
                                            <td>
                                                {{$onlineSession['therapist_name']}}
                                            </td>
                                            <td>
                                                {{$onlineSession['submission_date']}}
                                            </td>
                                            <td>
                                                {{$onlineSession['tracking_code']}}
                                            </td>
                                            <td>
                                                {{$onlineSession['status']}}
                                            </td>
                                            <td>
                                                @if($onlineSession['status'] == "Ongoing")
                                                <a href="/chats/convo/{{$onlineSession['chat_id']}}"><button class="primary-btn py-2 px-5">View Conversation</button></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                </tbody>
                            </table>
                            @if(empty($onlineSessions))
                            <p class="text-center fw-bold text-secondary p-5">No Online Sessions</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="py-4">
                    {{$matchers->links()}}
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
        
    </div>
    <x-footer></x-footer>
</body>
</html>