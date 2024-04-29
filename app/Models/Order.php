<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_id'
    ];
    use HasFactory;

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'orders_products', 'order_id', 'product_id')->withPivot('qty', 'id');;
        // Relacionamento NxN
        // orders_products: tabela intermediária
        // order_id: chave estrangeira da tabela orders
        // product_id: chave estrangeira da tabela products
        // withPivot: indica que a tabela intermediária possui uma coluna adicional
    }

    public function orderProducts(){
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
}
