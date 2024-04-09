<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=["name","slug","description","image","price","category_id"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopefilter(Builder $builder,$filter)
    {
        return $builder->when($filter["name"] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', 'like', '%' . $category . '%');
            });
        });
    }
    protected static function booted()
    {
        static::creating(function(Item $item){
            $item->slug= Str::slug($item->name);
        });
    }
    public function getImageUrlAttribute()
    {
        if(!$this->image) {
            return asset('images/No-Image.png');
        }
        if(Str::startsWith($this->image,["https://","https://"])){
            return $this->image;
        }
        return asset('storage/'.$this->image);
    }
}
