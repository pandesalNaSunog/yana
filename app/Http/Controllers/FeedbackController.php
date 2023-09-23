<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;
class FeedbackController extends Controller
{
    public function postFeed(Request $request){
        $fields = $request->validate([
            'feedback' => 'required|min:10'
        ]);

        $fields['user_id'] = auth()->user()->id;
        $fields['approval'] = 0;

        $user = User::where('id', $fields['user_id'])->first();
        if(!$user){
            return back()->with('message', 'Something went wrong.');
        }

        Feedback::create($fields);
        return back()->with('message', 'Feedback has been successfully posted.');
    }
}
