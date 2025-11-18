<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'user_id',
        'contact_info',
        'billing_data',
        'order_notes',
        'cart_data',
        'payment_mode',
        'payment_data',
        'status',
    ];

    protected $casts = [
        'billing_data' => 'array',
        'payment_data' => 'array',
        'cart_data' => 'array',
    ];
}
