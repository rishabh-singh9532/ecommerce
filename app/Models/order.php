<?php

namespace App\Models;
use App\Models\order_item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table="orders";    
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country	',
        'pincode',
        'message',
        'tracking_no',
        
    ];
    public function orderitem(){
        return $this->hasMany(order_item::class);
    }
}
