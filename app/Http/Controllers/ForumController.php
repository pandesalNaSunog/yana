<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
class ForumController extends Controller
{
    public function forums(){

        $posts = Post::latest()->paginate(10);
        $postData = [];
        foreach($posts as $post){
            $poster = User::where('id', $post->user_id)->first();
            $comments = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->limit(3)->get();
            $commentsData = [];
            foreach($comments as $comment){
                $user = User::where('id', $comment->user_id)->first();
                if($user){
                    $commentsData[] = [
                        'image' => $user->profile_picture,
                        'name' => $user->first_name . " " . $user->last_name,
                        'created_at' => $comment->created_at->format('M d, Y h:i A'),
                        'comment' => $comment->comment
                    ];
                }
            }
            if($poster){
                $postData[] = [
                    'id' => $post->id,
                    'image' => $poster->profile_picture,
                    'name' => $poster->first_name . " " . $poster->last_name,
                    'created_at' => $post->created_at->format('M d, Y h:i A'),
                    'post' => $post->post,
                    'comments' => $commentsData
                ];
            }
        }
        // return response($postData);
        return view('forums',[
            'posts' => $postData
        ]);
    }
    public function writePost(Request $request){
        $fields = $request->validate([
            'post' => 'required'
        ]);

        $fields['user_id'] = auth()->user()->id;

        Post::create($fields);

        return back()->with('message','Posted successfully.');
    }
    public function writeComment(Request $request){
        $fields = $request->validate([
            'comment' => 'required',
            'post_id' => 'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        if($user){
            $fields['user_id'] = auth()->user()->id;
            $comment = Comment::create($fields);
            $commentData = [
                'id' => $comment->id,
                'comment' => $comment->comment,
                'user' => $user
            ];
            return response($commentData, 200);
        }
        return response([
            'message' => 'error'
        ], 400);
    }
}
