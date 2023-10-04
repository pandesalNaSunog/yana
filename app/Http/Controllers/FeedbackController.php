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

    public function feedbacks(){
        $feedbacks = Feedback::latest()->paginate(5);
        $data = [];
        foreach($feedbacks as $feedback){
            $user = User::where('id', $feedback->user_id)->first();
            if($user){
                $data[] = [
                    'user' => $user,
                    'feedback' => $feedback
                ];
            }
        }
        return view('admin.feedbacks',[
            'feedbacks' => $data,
            'feedbackItems' => $feedbacks,
            'active' => 'feedbacks'
        ]);
    }
    public function postFeedback(Feedback $feedback){
        $feedback->update([
            'approval' => 1
        ]);
        return back()->with('message', 'This feedback has been posted to Landing Page Testimonials');
    }
    public function showTestimonials(){
        if(auth()->check()){
            if(auth()->user()->role != 2){
                return redirect('/redirector');
            }
            
        }
        $feedbacks = Feedback::where('approval', 1)->get();
        $data = [];
        foreach($feedbacks as $feedback){
            $user = User::where('id', $feedback->user_id)->first();

            if($user){
                $data[] = [
                    'name' => $user->first_name . " " . $user->last_name,
                    'image' => $user->profile_picture,
                    'feedback' => $feedback->feedback
                ];
            }
        }
        return view('home',[
            'feedbacks' => $data
        ]);
    }
}
