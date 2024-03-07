<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function product_combinations(){
        return $this->hasMany(Product_combination::class, 'product_id');
    }
    public function product_galleries(){
        return $this->hasMany(Product_gallery::class, 'product_id');
    }
}
