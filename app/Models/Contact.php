<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


    Protected $table='contact';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];
}
