<?php

namespace App\Models;
use App\Models\products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    use HasFactory;
    protected $table="order_items";    
    protected $fillable = [
        'order_id',
        'prod_id',
        'qty',
        'price',
    ];

    public function product(){
        return $this->belongsTo(Products::class,'prod_id','id');
    }
}
