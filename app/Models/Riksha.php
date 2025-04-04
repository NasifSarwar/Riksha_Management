<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}

