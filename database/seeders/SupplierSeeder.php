<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier = new Supplier();
        $supplier->name = 'Aurora Alimentos S/A';
        $supplier->email = 'contato@aurora.com.br';
        $supplier->site = 'www.aurora.com.br';
        $supplier->uf = 'MG';
        $supplier->save();

        Supplier::create([
            'name' => 'Sadia',
            'email' => 'contato@sadia.com.br',
            'uf' => 'MG',
            'site' => 'www.sadia.com.br'
        ]); // utilizando os fillables

        DB::table('suppliers')->insert([
            'name' => 'Perdigão',
            'email' => 'contato@perdigao.com.br',
            'uf' => 'SC',
            'site' => 'www.perdigao.com.br'
        ]); // não passa pelo eloquent
    }
}
