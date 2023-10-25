<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA Administrator | Feedbacks</title>
</head>
<body>
    <x-admin-nav :active="$active"></x-admin-nav>
    <x-toast></x-toast>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="fw-bold">Feedbacks</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <th scope="col">Name</th>
                            <th scope="col">Feedback</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </thead>
                        <tbody>
                            @foreach($feedbacks as $feedback)
                            <tr>
                                <td>
                                    {{$feedback['user']->first_name . " " . $feedback['user']->last_name}}
                                </td>
                                <td>
                                    {{$feedback['feedback']->feedback}}
                                </td>
                                <td>
                                    @if($feedback['feedback']->approval == 0)
                                    Not Posted
                                    @else
                                    Posted
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button data-bs-toggle="dropdown" class="px-5 py-2 primary-outline-btn dropdown-toggle">Actions</button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @if($feedback['feedback']->approval == 0)
                                                <form action="/admin/post-feedback/{{$feedback['feedback']->id}}" onsubmit="return confirm('Are you sure you want to post this feedback to client testimonials?')" method="POST">
                                                    @csrf
                                                    <button class="dropdown-item">Post</button>
                                                </form>
                                                
                                                @else
                                                <form action="/admin/unpost-feedback/{{$feedback['feedback']->id}}" onsubmit="return confirm('Are you sure you want to unpost this feedback from client testimonials?')" method="POST">
                                                    @csrf
                                                    <button class="dropdown-item">Unpost</button>
                                                </form>
                                                @endif
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
            {{$feedbackItems->links()}}
        </div>
    </div>
</body>
</html>