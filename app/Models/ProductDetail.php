<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'length', // comprimento
        'height', // altura
        'width', // largura
        'product_id',
        'unit_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class); // belongsTo indica relacionamento 1xN
    }
}
