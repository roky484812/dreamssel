<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile_meta extends Model
{
    protected $fillable = ['user_id', 'key', 'value'];
    use HasFactory;
    public $timestamps = false;
}
