<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Matcher;
use App\Models\Chats;
class ChatController extends Controller
{
    public function chats(){
        return view('chat');
    }
}
