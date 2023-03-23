<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class userdata extends Authenticatable
{
    use HasFactory;
    // protected $table='userdatas';
     protected $fillable = [
        'username',
        'Roll',
        'password',
        'EmploeeId',
    ];
     public function getAuthPassword()
    {
        return 'password';
    }

    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
