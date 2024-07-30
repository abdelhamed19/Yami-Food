<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends=[
        'total_cart_cost'
    ];
    public $incrementing = false;
    protected static function booted()
    {
        static::addGlobalScope('user',function ($builder){
            $builder->user_id = Auth::id();
        });
        static::creating(function (Cart $cart){
            $cart->uuid = Str::uuid();
            $cart->user_id = Auth::id();
        });
    }
    public function scopeTotalCartCost()
    {
        $total = $this->where('user_id',Auth::id())->sum('price');
        return $total;
    }
}
