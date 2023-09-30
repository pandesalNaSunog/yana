<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA Administrator | Edit Solution</title>
</head>
<body>
    <x-admin-nav></x-admin-nav>
    <x-toast></x-toast>

    <div class="container my-5">
        <div class="card shadow mx-auto col-lg-5">
            <div class="card-header">
                <h4 class="fw-bold">
                    Edit Solution
                </h4>
            </div>
            <div class="card-body">
                <form action="/yana/update-solution/{{$solution->id}}" method="POST">
                    @csrf
                    <input type="text" placeholder="Solution" name="solution" value="{{$solution->solution}}" class="form-control">
                    <button class="primary-btn px-5 py-2 mt-3">Confirm</button>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>