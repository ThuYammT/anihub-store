<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'order_date',
        'order_items',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'payment_type',
        'total_amount',
        'order_status',
    ];
}