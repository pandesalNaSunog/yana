<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\MailCred;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function createCreds(){
        MailCred::create([
            'username' => 'yanaect@gmail.com',
            'password' => 'mqcy ehvx pmea rsyc',
            'secure' => 'ssl',
            'port' => '465'
        ]);
        return response([

            'message' => 'ok'
        ]);
    }
}
