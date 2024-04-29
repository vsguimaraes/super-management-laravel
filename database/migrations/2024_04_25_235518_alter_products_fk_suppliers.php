<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $supplier_id_default = DB::table('suppliers')->insertGetId([
                'name' => 'Fornecedor Padrão',
                'site' => 'www.fornecedorpadrao.com.br',
                'uf' => 'BA',
                'email' => 'contato@fornecedorpadrao.com.br'
            ]); // como já tem registros de produtos no banco, pra evitar um erro de chave estrangeira, precisa criar um fornecedor padrão

            $table->unsignedBigInteger('supplier_id')->default($supplier_id_default)->after('id') ; // precisa passar o fornecedor padrão como valor padrão do campo
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_supplier_id_foreign');
            $table->dropColumn('supplier_id');
        });
    }
};
