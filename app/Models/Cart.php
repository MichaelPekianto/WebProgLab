<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['quantity', 'product_id', 'user_id'];
    public function getProduct()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
