<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    
    protected $primaryKey = 'registerID';

    protected $casts = [
        'registerID' => 'integer',
        'login' => 'string',
        'password' => 'string',
        'phone' => 'string',
    ];

    protected $fillable = [
        'login',
        'password',
        'phone',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;
}
