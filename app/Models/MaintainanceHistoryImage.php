<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintainanceHistoryImage extends Model
{
    protected $fillable = [
        'maintainance_history_id',
        'image_path',
    ];

    public function maintainanceHistory()
    {
        return $this->belongsTo(MaintainanceHistory::class);
    }
}
