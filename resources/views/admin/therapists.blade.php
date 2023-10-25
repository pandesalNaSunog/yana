<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Administrator | Therapists</title>
</head>
<body>
    <x-admin-nav :active="$active"></x-admin-nav>
    <div class="container">
        <div class="card mt-5 shadow">
            <div class="card-header">
                <h3 class="fw-bold">Therapists</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                
                    <table class="table table-striped table-hover">
                        <thead>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            @foreach($therapists as $therapist)
                            <tr>
                                <td>{{$therapist->first_name}}</td>
                                <td>{{$therapist->last_name}}</td>
                                <td>{{$therapist->email}}</td>
                                <td>{{$therapist->contact_number}}</td>
                                <td>{{date_format(date_create($therapist->birth_date), 'M d, Y')}}</td>
                                <td><a href="/admin/users/{{$therapist->id}}"><button class="primary-outline-btn px-5 py-2">View Credentials</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>

        <div class="mt-3">
            {{$therapists->links()}}
        </div>

        
    </div>
</body>
</html>