<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Forums</title>
</head>
<body>
    <x-client-nav>

    </x-client-nav>
    <x-toast></x-toast>
    <div class="container py-5">
        <div class="col col-lg-6 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <form action="/yana/write-post" method="POST">
                        @csrf
                        <textarea name="post" class="form-control" placeholder="What's on your mind?"></textarea>
                        @error('post')
                        <x-error-text>{{$message}}</x-error-text>
                        @enderror
                        <button class="mt-3 primary-btn w-100 py-2">Post</button>
                    </form> 
                </div>
            </div>
        </div>
        <div class="mt-4">
            @foreach($posts as $post)
            <div class="card shadow col-lg-6 mx-auto mt-2">
                <div class="card-body">
                    <div class="d-flex">
                        @if($post['image'] == "")
                        <img src="/yana/empty.jpeg" style="height: 60px; width: 60px; object-fit:cover" alt="" class="rounded-circle img-fluid">
                        @else
                        <img src="/yana/public/storage/{{$post['image']}}" style="height: 60px; width: 60px; object-fit:cover" alt="" class="rounded-circle img-fluid">
                        @endif
                        <div class="ms-3">
                            <p class="fw-bold m-0">{{$post['name']}}</p>
                            <p class="m-0"><small>{{$post['created_at']}}</small></p>
                        </div>
                    </div>
                    <p class="fs-3 p-3">{{$post['post']}}</p>
                </div>
                <div class="card-footer">
                    <a href="" class="btn-link">View Comments</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>