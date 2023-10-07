<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Administrator | Patients</title>
</head>
<body>
    <x-admin-nav :active="$active"></x-admin-nav>
    <div class="container">
        <div class="card mt-5 shadow">
            <div class="card-header">
                <h3 class="fw-bold">Patients</h3>
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
                        <th scope="col">Verification Status</th>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->first_name}}</td>
                            <td>{{$patient->last_name}}</td>
                            <td>{{$patient->email}}</td>
                            <td>{{$patient->contact_number}}</td>
                            <td>{{date_format(date_create($patient->birth_date), 'M d, Y')}}</td>
                            <td>
                                @if($patient->verified != 2)
                                Non-verified
                                @else
                                Verified
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>

            
        </div>

        <div class="mt-3">
            {{$patients->links()}}
        </div>

        
    </div>
</body>
</html>