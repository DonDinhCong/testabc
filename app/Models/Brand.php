<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'brand_image',
        'brand_title',
        'brand_content',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

    public function take8Product(){
        return $this->hasMany(Product::class, 'brand_id', 'id')->take(8);
    }
}
