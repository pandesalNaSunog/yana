<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Matcher;
use App\Models\Chats;
use App\Models\Message;
class ChatController extends Controller
{
    public function loadConversation(Chats $chats){
        $chatArray = Chats::where('user_1_id', auth()->user()->id)->orWhere('user_2_id', auth()->user()->id)->get();
        $chatData = [];
        foreach($chatArray as $chat){
            if($chat->user_1_id != auth()->user()->id){
                $userId = $chat->user_1_id;
                $user = User::where('id', $userId)->first();
            }else{
                $userId = $chat->user_2_id;
                $user = User::where('id', $userId)->first();
            }

            $latestMessage = Message::where('sender_id', $userId)->where('receiver_id', auth()->user()->id)->orderBy('id','desc')->first();
            if($latestMessage){
                $latestMessageMessage = $latestMessage->message;
                $time = $latestMessage->created_at->format('h:i A');
            }else{
                $latestMessageMessage = "";
                $time = "";
            }

            if($user->profile_picture == ""){
                $profilePicture = "/empty.jpeg";
            }else{
                $profilePicture = $user->profile_picture;
            }

            if($user){
                $chatData[] = [
                    'name' => $user->first_name,
                    'receiver_id' => $user->id,
                    'image' => $profilePicture,
                    'latest_message' => $latestMessageMessage,
                    'time' => $time,
                    'chat_id' => $chat->id,
                    
                ];
            }
            
        }
        if(!empty($chatData)){
            $chatId = $chats->id;
            $messages = Message::where('chat_id', $chatId)->latest()->paginate(10);
            $messageData = [];
            $reversedMessages = $messages->reverse();
            foreach($reversedMessages as $message){
                $sender = User::where('id', $message->sender_id)->first();
                $receiver = User::where('id', $message->receiver_id)->first();
                if($sender){
                    if($sender->profile_picture != ""){
                        $image = 'public/storage/' . $sender->profile_picture;
                    }else{
                        $image = 'empty.jpeg';
                    }
                    if($sender->id == auth()->user()->id){
                        $mine = 1;
                        $receiverId = $receiver->id;
                    }else{
                        $mine = 0;
                        $receiverId = $sender->id;
                    }
                    
    
                    $messageData[] = [
                        'image' => $image,
                        'message' => $message->message,
                        'mine' => $mine,
                        'date_time' => $message->created_at->format('M d, Y h:i A')
                    ];
                }
                
            }
        }
        
        return view('conversation',[
            'chats' => $chatArray,
            'chatData' => $chatData,
            'messageData' => $messageData,
            'chat_id' => $chatId,
            'receiver_id' => $receiverId,
            'active' => 'none'
        ]);
    }
    public function chats(){
        $chats = Chats::where('user_1_id', auth()->user()->id)->orWhere('user_2_id', auth()->user()->id)->get();


        $chatData = [];
        foreach($chats as $chat){
            if($chat->user_1_id != auth()->user()->id){
                $userId = $chat->user_1_id;
                $user = User::where('id', $userId)->first();
            }else{
                $userId = $chat->user_2_id;
                $user = User::where('id', $userId)->first();
            }

            $latestMessage = Message::where('sender_id', $userId)->where('receiver_id', auth()->user()->id)->orderBy('id','desc')->first();
            if($latestMessage){
                $latestMessageMessage = $latestMessage->message;
                $time = $latestMessage->created_at->format('h:i A');
            }else{
                $latestMessageMessage = "";
                $time = "";
            }

            if($user->profile_picture == ""){
                $profilePicture = "/empty.jpeg";
            }else{
                $profilePicture = $user->profile_picture;
            }

            if($user){
                $chatData[] = [
                    'name' => $user->first_name,
                    'receiver_id' => $user->id,
                    'image' => $profilePicture,
                    'latest_message' => $latestMessageMessage,
                    'time' => $time,
                    'chat_id' => $chat->id,
                    
                ];
            }
            
        }


        
        return view('chat',[
            'chatData' => $chatData,
            'active' => 'none'
        ]);
    }

    public function sendMessage(Request $request){
        $fields = $request->validate([
            'receiver_id' => 'required',
            'message' => 'required',
            'chat_id' => 'required'
        ]);
        $fields['sender_id'] = auth()->user()->id;
        $message = Message::create($fields);
        $sender = User::where('id', auth()->user()->id)->first();
        if($sender->profile_picture == ""){
            $image = '/empty.jpeg';
        }else{
            $image = '/public/storage/' . $sender->profile_picture;
        }
        return response([
            'image' => $image,
            'id' => $message->id,
            'sender_id' => $message->sender_id,
            'receiver_id' => $message->receiver_id,
            'message' => $message->message,
            'chat_id' => $message->chat_id,
            'created_at' => $message->created_at->format('M d, Y h:i A'),
            'updated_at' => $message->updated_at->format('M d, Y h:i A'),
        ]);
    }
}
