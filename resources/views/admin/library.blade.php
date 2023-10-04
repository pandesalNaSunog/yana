<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA Administrator | Library</title>
</head>
<body>
    <x-toast></x-toast>
    <x-admin-nav :active="$active"></x-admin-nav>

    <div class="modal fade" id="add-category-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="fw-bold">Add Category</h4>
                </div>
                <form action="/add-category" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input required type="text" name="category" placeholder="Category" class="form-control">
                        @error('category')
                        <x-error-text>{{$message}}</x-error-text>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="primary-btn">Confirm</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="fw-bold">Library</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </thead>
                        <tbody>
                            @foreach($libraryCategories as $category)
                            <tr>
                                <td>
                                    {{$category->category}}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button data-bs-toggle="dropdown" class="primary-outline-btn px-5 py-2 dropdown-toggle">Actions</button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="/admin/solutions/{{$category->id}}" class="dropdown-item">View Solutions</a>
                                            </li>
                                            <li>
                                                <a href="/admin/edit-category/{{$category->id}}" class="dropdown-item">Edit</a>
                                            </li>
                                            <hr class="dropdown-divider">
                                            <li>
                                                <form action="/admin/delete-category/{{$category->id}}" onsubmit="return confirm('Are you sure you want to delete this category? All solutions related to this will also be deleted.')" method="POST">
                                                    @csrf
                                                    <button class="dropdown-item text-danger">Delete</button>
                                                </form>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-end">
            <div class="py-2">
            {{$libraryCategories->links()}}
            </div>
            
            <button class="mt-3 ms-auto primary-btn px-5 py-2" data-bs-toggle="modal" data-bs-target="#add-category-modal">Add Category</button>
        </div>
       
    </div>
    
</body>
</html>