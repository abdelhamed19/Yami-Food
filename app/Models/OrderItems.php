<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItems extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $casts = ['options' => 'array'];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    protected static function booted()
    {
        static::creating(function (OrderItems $item){
            $item->uuid = Str::uuid();
        });
        static::addGlobalScope(function(Builder $builder){
            $builder->where("user_id",Auth::id());
        });
    }
    public function getTotalPriceAttribute()
    {
        return $this->where('user_id', auth()->id())
        ->sum('price');
    }
    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = $value;

        // Retrieve the item associated with this order item
        $item = Item::findOrFail($this->item_id);

        // Calculate the new price based on the quantity
        if ($value == 1) {
            $this->attributes['price'] = $item->price;
        } else {
            $this->attributes['price'] = $item->price * $value;
        }
    }
}
