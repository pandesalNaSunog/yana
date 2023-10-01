<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
class ForumController extends Controller
{
    public function forums(){

        $posts = Post::latest()->paginate(10);
        $postData = [];
        foreach($posts as $post){
            $user = User::where('id', $post->user_id)->first();
            if($user){
                $postData[] = [
                    'image' => $user->profile_picture,
                    'name' => $user->first_name . " " . $user->last_name,
                    'created_at' => $post->created_at->format('M d, Y h:i A'),
                    'post' => $post->post
                ];
            }
        }
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
}
