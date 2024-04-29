<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
        });

        Schema::create('products_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('price', 8, 2);
            $table->decimal('stock_min')->default(1);
            $table->decimal('stock_max')->default(1);
            $table->timestamps();

            // adicionando chaves estrangeiras
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('product_id')->references('id')->on('products');

        });
        // removendo colunas da tabela produtos - adicionando às filiais
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price', 'stock_min', 'stock_max');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->float('price', 8, 2)->default(0.01);
            $table->integer('stock_min')->default(1);
            $table->integer('stock_max')->default(1);
        });

        Schema::table('products_branches', function (Blueprint $table) {
            // removendo chaves estrangeiras
            $table->dropForeign('products_branches_product_id_foreign');
            $table->dropForeign('products_branches_branch_id_foreign');
        });

        Schema::dropIfExists('products_branches');
        Schema::dropIfExists('branches');
    }
};
