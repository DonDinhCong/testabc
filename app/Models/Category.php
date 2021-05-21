<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'cate_title',
        'cate_image',
    ];

    public function mapCates(){
        return $this->hasMany(MapCate::class, 'cate_id', 'id');
    }

    public function mapCateDisplay(){
        return $this->hasMany(MapCate::class, 'cate_id', 'id')->take(8);
    }
}
