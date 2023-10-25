<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA Administrator | Edit Solution</title>
</head>
<body>
    <x-admin-nav :active="$active"></x-admin-nav>
    <x-toast></x-toast>

    <div class="container my-5">
        <div class="card shadow mx-auto col-lg-5">
            <div class="card-header">

                    
                    <h4 class="fw-bold">
                        Edit Solution
                    </h4>
                
                
                <p class="m-0"><small>Category: {{$category->category}}</small></p>
            </div>

  

            <div class="card-body">
                <form action="/yana/update-solution/{{$solution->id}}" method="POST">
                    @csrf
                    <input type="text" placeholder="Solution" name="solution" value="{{$solution->solution}}" class="form-control">
                    <div class="mt-3">
                        
                    

                            <button class="primary-btn px-5 py-2 w-100">Confirm</button>
                        
                    </div>
                    
                </form>
                
            </div>
            
            
        </div>
        <div class="text-center mt-3">
                <a href="/yana/admin/solutions/{{$category->id}}" class="btn-link">Back</a>
            </div>
    </div>
</body>
</html>