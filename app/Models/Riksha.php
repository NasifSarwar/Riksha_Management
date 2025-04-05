<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Riksha extends Model
{
    use HasFactory;

    protected $primaryKey = 'riksha_id';

    protected $fillable = [
        'buyer_id',
        'purchase_date',
        'district',
        'division',
        'police_station',
        'is_approved',
        'qr_code',
        'puller_id',
        'assigned_at',
        'status',
    ];

    protected $casts = [
        'assigned_at' => 'datetime',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function puller()
    {
    return $this->belongsTo(User::class, 'puller_id');
    }
}

