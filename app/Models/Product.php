<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_code',
        'brand_id',
        'product_title',
        'product_avatar',
        'product_gender',
        'product_origin',
        'product_color',
        'product_case',
        'product_size',
        'product_band',
        'product_glass',
        'product_des',  
        'product_price',  
    ];

    public function brand(){
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function mapCates(){
        return $this->hasMany(MapCate::class, 'product_id', 'id');
    }

    public function galleries(){
        return $this->hasMany(Gallery::class, 'product_id', 'id');
    }
}
