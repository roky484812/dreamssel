<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function order_list()
    {
        return $this->hasMany(Order_list::class, 'order_id')->with('product_fetch');
    }
}
