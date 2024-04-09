<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=["name","slug","description","image"];
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    protected static function booted()
    {
        static::creating(function(Category $category){
            $category->slug= Str::slug($category->name);
        });
    }
}
