<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
    {
        static::creating(function ($reservation) {
            $reservation->number = rand(100000, 999999);
        });
    }
}
