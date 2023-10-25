<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA Administrator | Edit Category</title>
</head>
<body>
    <x-toast></x-toast>
    <x-admin-nav :active="$active"></x-admin-nav>

    <div class="container my-5">
        <div class="card shadow mx-auto col-lg-5">
            <div class="card-header">
                <h4 class="fw-bold">Edit Category</h4>
            </div>
            <div class="card-body">
            
                <form action="/yana/admin/update-category/{{$category->id}}" method="POST">
                    @csrf
                    <input type="text" name="category" placeholder="Category" value="{{$category->category}}" required class="form-control">
                    <button class="primary-btn w-100 mt-3 py-2">Confirm</button>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>