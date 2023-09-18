<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matcher;
use App\Models\User;
class MatcherController extends Controller
{
    public function confirmSession(Request $request){
        $fields = $request->validate([
            'matcher_id' => 'required'
        ]);

        $matcher = Matcher::where('id', $fields['matcher_id'])->first();
        if($matcher){
            $matcher->update([
                'approval' => 1
            ]);
        }

        echo 'ok';
    }
    public function postMatcher(Request $request){
        $fields = $request->validate([
            'therapist_id' => 'required'
        ]);

        $fields['patient_id'] = auth()->user()->id;
        $fields['approval'] = 0;
        do{
            $trackingNumber = "";
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            for($i = 0;$i < 8;$i++){
                $index = rand(0,35);
                $trackingNumber .= $characters[$index];
            }

            $trackingNumberMatch = Matcher::where('tracking_number', $trackingNumber)->first();
        }while($trackingNumberMatch);
        $fields['tracking_number'] = $trackingNumber;
        $fields['read'] = 0;
        $matcher = Matcher::create($fields);
        return redirect('/matcher?tracking=' . $trackingNumber);

    }

    public function viewTracking(Request $request){
        $trackingNumber = $request->tracking;
        $matcher = Matcher::where('tracking_number', $trackingNumber)->where('read',0)->first();
        if(!$matcher){
            return redirect('/redirector');
        }
        $matcher->update([
            'read' => 1
        ]);
        return view('matching-success', [
            'tracking_number' => $trackingNumber
        ]);
    }
}
