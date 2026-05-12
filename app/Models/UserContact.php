<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    protected $table = 'user_contact';

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'latitude',
        'longitude',
        'facebook'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
