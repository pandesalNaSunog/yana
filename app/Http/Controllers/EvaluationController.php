<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Evaluation;
class EvaluationController extends Controller
{
    public function evaluationForm(){
        if(auth()->user()->can_take_evalutation == 1){
            return view('evalutation-form',[
                'active' => 'none'    
            ]);
        }
        return redirect('/')->with('message', 'You are not allowed to take evaluation unless authorized by the doctor.');
    }
    public function submitAssessment(Request $request){
        $user = User::where('id', auth()->user()->id)->first();

        if($user->can_take_evalutation == 1){
            $fields = $request->all();
            $fields['user_id'] = auth()->user()->id;
            Evaluation::create($fields);
            $user->update([
                'can_take_evalutation' => 0
            ]);
            return redirect('/')->with('message', 'Your evaluation has been successfully submitted.');
        }
        
    }
    public function patientProgressTracker(User $user){
        $evaluations = Evaluation::where('user_id', $user->id)->get();

        $anxiety = [];
        $depression = [];
        $evaluationDates = [];
        $stress = [];
        $sleepDisturbances = [];
        $mood = [];
        $progress = [];
        foreach($evaluations as $evaluation){
            $anxiety[] = $evaluation->anxiety;
            
            $depression[] = $evaluation->depression;
            $stress[] = $evaluation->stress;
            $sleepDisturbances[] = $evaluation->sleep_disturbances;
            $mood[] = $evaluation->mood;
            $progress[] = $evaluation->progress;
            
            $evaluationDates[] = $evaluation->created_at->format('M d, Y');
        }

        $data = [
            'anxiety' => $anxiety,
            'depression' => $depression,
            'evaluation_dates' => $evaluationDates,
            'stress' => $stress,
            'sleep_disturbances' => $sleepDisturbances,
            'mood' => $mood,
            'progress' => $progress,
            'user' => $user,
            'active' => 'none'
        ];

        return view('therapist.patient-progress-tracker', $data);
    }
}
