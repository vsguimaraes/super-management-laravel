<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = 'orders_products';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
