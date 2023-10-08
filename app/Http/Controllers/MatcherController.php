<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matcher;
use App\Models\User;
use App\Models\Chats;
use App\Models\Message;
class MatcherController extends Controller
{
    public function confirmSession(Request $request){
        $fields = $request->validate([
            'matcher_id' => 'required'
        ]);

        $matcher = Matcher::where('id', $fields['matcher_id'])->first();
        if($matcher){
            
            $chat = Chats::create([
                'user_1_id' => $matcher->therapist_id,
                'user_2_id' => $matcher->patient_id,
                'status' => 0
            ]);
            $matcher->update([
                'approval' => 1,
                'chat_id' => $chat->id
            ]);
            Message::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $matcher->patient_id,
                'message' => 'Hello there. How may I help you?',
                'chat_id' => $chat->id
            ]);
            $user = User::where('id', $matcher->patient_id)->first();
            if($user){
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $mailCreds->username; 
                $mail->Password = $mailCreds->password; 
                $mail->SMTPSecure = $mailCreds->secure; 
                $mail->Port = $mailCreds->port;
    
                $mail->setFrom('yanaect@gmail.com', 'YANA');
                $mail->addAddress($user->email);
                $mail->isHTML(true);
    
                $mail->Subject = 'Session Confirmation';
                $mail->Body = 'Your session request with tracking code ' . $matcher->tracking_number . ' has been approved by Dr. ' . auth()->user()->first_name . " " . auth()->user()->last_name . '.';
    
                if(!$mail->send()){
                    $user->delete();
                    return redirect('/')->with('message', 'Your registered email is invalid');
                }
                return redirect('/chats/convo/' . $chat->id);
            }
            
            
        }
        return redirect('/therapist')->with('message', 'Something went wrong');
        
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
        $fields['chat_id'] = 0;
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
