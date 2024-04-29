<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'site',
        'uf'
    ]; // para realizar a inserção de dados de forma estática, precisa instanciar $fillable

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
