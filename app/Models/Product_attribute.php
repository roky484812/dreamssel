<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_attribute extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function attribute_values(){
        return $this->hasMany(Product_attribute_value::class, 'attribute_id');
    }
}
