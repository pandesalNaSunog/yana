<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailCred extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'secure',
        'port'
    ];
}
