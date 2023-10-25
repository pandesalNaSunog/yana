<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA Administrator | {{$category->category . " Solutions"}}</title>
</head>
<body>
    <x-toast></x-toast>
    <x-admin-nav :active="$active"></x-admin-nav>
    <div class="modal fade" id="add-solution-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h4 class="fw-bold">Add Solution</h4>
                    </div>
                </div>
                <form action="/yana/add-solution" method="POST">
                    @csrf
                    <div class="modal-body">
                        
                            
                        <input required name="solution" type="text" placeholder="Solution" class="form-control">
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                            
                       
                        
                    </div>
                    <div class="modal-footer">
                        <button class="primary-btn px-5 py-2">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="fw-bold">{{$category->category . " Solutions"}}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th scope="col">Solution</th>
                            <th scope="col">Actions</th>
                        </thead>
                        <tbody>
                            @foreach($solutions as $solution)
                            <tr>
                                <td>
                                    {{$solution->solution}}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="primary-outline-btn px-5 py-2 dropdown-toggle" data-bs-toggle="dropdown">Actions</button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="/yana/admin/edit-solution/{{$solution->id}}" class="dropdown-item">Edit</a>
                                                

                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form action="/yana/delete-solution/{{$solution->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this solution?')">
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
        <div class="py-2">
            {{$solutions->links()}}
        </div>
        <div class="text-end mt-3">
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <a href="/yana/admin/library" style="text-decoration: none"><button class="w-100 w-lg-50 d-block primary-outline-btn px-5 py-2">Back to Library</button></a>   
                </div>
                <div class="col">
                    <button data-bs-toggle="modal" data-bs-target="#add-solution-modal" class="w-100 w-lg-50 ms-auto d-block mt-3 mt-lg-0 primary-btn px-5 py-2">Add Solution</button>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>