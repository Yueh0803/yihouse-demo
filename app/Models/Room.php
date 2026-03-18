<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'room_type',
        'description',
        'price_per_night',
        'capacity',
        'amenities',
        'is_available',
        'created_by',
    ];

    protected $casts = [
        'price_per_night' => 'decimal:2',
        'is_available' => 'boolean',
        'amenities' => 'json',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
}
