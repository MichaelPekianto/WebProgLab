<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['quantity', 'product_id',  'user_id', 'transaction_id'];
    public function getProduct()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
    public function getTransaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
