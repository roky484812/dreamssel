<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    public function sub_category(){
        return $this->hasMany(Product_sub_category::class, 'category_id');
    }
}
