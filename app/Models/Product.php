<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function order_list(){
        return $this->hasMany(Order_list::class, 'product_id');
    }
    public function product_combinations(){
        return $this->hasMany(Product_combination::class, 'product_id');
    }
    public function product_galleries(){
        return $this->hasMany(Product_gallery::class, 'product_id');
    }
    public function category(){
        return $this->belongsTo(Product_category::class);
    }
    public function totalOrderedQuantity(){
        return $this->order_list()->sum('quantity');
    }
    public function flash_sale(){
        return $this->hasOne(Flash_sale::class, 'product_id');
    }
}
