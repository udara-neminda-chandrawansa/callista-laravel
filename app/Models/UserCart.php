<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;

    protected $table = 'user_carts';

    protected $fillable = [
        'user_id',
        'item_id',
        'name',
        'price',
        'quantity',
        'attributes'
    ];
}
