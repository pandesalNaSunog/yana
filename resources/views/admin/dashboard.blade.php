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
                        <h1 class="fw-bold fs-1">200</h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Therapists</h4>
                        <h1 class="fw-bold fs-1">200</h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow" style="border: none">
                    <div class="card-body">
                        <h4 class="text-primary-color">Feedbacks</h4>
                        <h1 class="fw-bold fs-1">200</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>