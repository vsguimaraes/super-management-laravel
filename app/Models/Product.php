<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'name',
        'description',
        'unit_id',
        'weight',
    ];

    public function productDetail(){
        return $this->hasOne(ProductDetail::class); // hasOne indica relacionamento 1x1
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class); // belongsTo indica relacionamento 1xN
    }

    public function unit(){
        return $this->belongsTo(Unit::class); // belongsTo indica relacionamento 1xN
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'orders_products', 'product_id', 'order_id')->withPivot('qty', 'id');
        // Relacionamento NxN
        // orders_products: tabela intermediária
        // product_id: chave estrangeira da tabela products
        // order_id: chave estrangeira da tabela orders
        // withPivot: indica que a tabela intermediária possui uma coluna adicional
    }
}
