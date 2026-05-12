<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintainanceHistory extends Model
{
    protected $fillable = [
        'bike_id',
        'details',
        'total',
        'odometer',
        'brand_id',
        'bike_model',
        'maintainer_id',
        'plate',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }

    public function images()
    {
        return $this->hasMany(MaintainanceHistoryImage::class);
    }

    public function maintainer()
    {
        return $this->belongsTo(User::class, 'maintainer_id', 'id');
    }

    public function qrLog()
    {
        return $this->hasOne(QrLog::class, 'maintenance_id', 'id');
    }
}
