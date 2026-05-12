<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QrLog extends Model
{
    protected $table = 'qr_logs';
    protected $fillable = [
        'qr_path',
        'maintenance_id',
        'uuid'
    ];

    public function maintenance()
    {
        return $this->belongsTo(MaintainanceHistory::class, 'maintenance_id', 'id');
    }
}
