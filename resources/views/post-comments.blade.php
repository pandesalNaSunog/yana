<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-imports></x-imports>
    <title>YANA | Comments</title>
</head>
<body>
    <x-client-nav></x-client-nav>
    <div class="container my-5">
        <div class="card shadow mx-auto col-lg-5">
            <div class="card-body">
                <div class="d-flex">
                    @if($post['image'] == "")
                    <img src="/empty.jpeg" style="height: 60px; width: 60px; object-fit:cover" alt="" class="rounded-circle img-fluid">
                    @else
                    <img src="/public/storage/{{$post['image']}}" style="height: 60px; width: 60px; object-fit:cover" alt="" class="rounded-circle img-fluid">
                    @endif
                    <div class="ms-3">
                        <p class="fw-bold m-0">{{$post['name']}}</p>
                        <p class="m-0"><small>{{$post['created_at']}}</small></p>
                    </div>
                </div>
                <p class="fs-3 p-3">{{$post['post']}}</p>
            </div>
            <div class="card-footer">

                <div class="mt-3" id="comments-with-post-id-{{$post['id']}}">
                    @foreach($post['comments'] as $comment)
                        <div class="card shadow my-1">
                            <div class="card-body d-flex">
                                
                                <img src="/<?php if($comment['image'] == ""){ echo 'empty.jpeg';}else{ echo '/public/storage/' . $comment['image']; }?>" class="img-fluid rounded-circle" style="height: 50px; width: 50px; object-fit: cover">
                                <div class="ms-3">
                                <p class="m-0 fw-bold">{{$comment['name']}}</p>
                                <p class="m-0">{{$comment['comment']}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="input-group mt-3">
                    <input id="write-comment-at-post-{{$post['id']}}" type="text" placeholder="Write your comment here..." name="comment" class="form-control">
                    
                    <button id="post-comment-at-post-{{$post['id']}}" class="primary-btn">Post</button>
                </div>
                <p class="text-danger"><small id="error-text-at-post-{{$post['id']}}"></small></p>
                <script>
                    $(document).ready(function(){
                        var postId = <?php echo $post['id']; ?>;
                        var commentsSection = $('#comments-with-post-id-' + postId);
                        var writeComment = $('#write-comment-at-post-' + postId);
                        var postComment = $('#post-comment-at-post-' + postId);
                        var errorText = $('#error-text-at-post-' + postId);
                        errorText.hide();
                        postComment.click(function(){
                            if(writeComment.val() == ""){
                                errorText.text('Please fill out this field');
                                errorText.show();
                            }else{
                                $.ajax({
                                    type: 'POST',
                                    url: "{{route('write-comment')}}",
                                    data: {
                                        comment: writeComment.val(),
                                        post_id: postId
                                    },
                                    success: function(response){
                                        let name = response.user.first_name + " " + response.user.last_name;
                                        displayPostedComment(response.comment, name, response.user.profile_picture);
                                    }
                                })

                                writeComment.val('');
                            }
                        });
                        writeComment.keydown(function(e){
                            if(e.keyCode == 13){
                                e.preventDefault();
                                postComment.click();
                            }
                            errorText.text('');
                            errorText.hide();
                        
                        });


                        function displayPostedComment(comment, name, image){
                            let picture = "";
                            if(image == ""){
                                picture = "/empty.jpeg";
                            }else{
                                picture = "/public/storage/" + image;
                            }
                            commentsSection.prepend(`<div class="card shadow my-1">
                                                        <div class="card-body d-flex">
                                                            
                                                            <img src="/${picture}" class="img-fluid rounded-circle" style="height: 50px; width: 50px; object-fit: cover">
                                                            <div class="ms-3">
                                                            <p class="m-0 fw-bold">${name}</p>
                                                            <p class="m-0">${comment}</p>
                                                            </div>
                                                        </div>
                                                    </div>`)
                        }
                    })
                </script>
            </div>
        </div>
        
    </div>
    
</body>
</html>