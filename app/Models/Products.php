<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function getCart()
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
    public function getTransactiondetail(){
        return $this->hasMany(TransactionDetail::class, 'product_id');
    }
}
