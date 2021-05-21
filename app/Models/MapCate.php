<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapCate extends Model
{
    use HasFactory;

    protected $table = 'map_cates';

    protected $fillable = [
        'product_id',
        'cate_id',
    ];

    public function cate(){
        return $this->hasOne(Category::class, 'id', 'cate_id');
    }

    public function product(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
