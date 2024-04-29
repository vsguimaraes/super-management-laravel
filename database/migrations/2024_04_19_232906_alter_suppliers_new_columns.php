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
        Schema::table('suppliers', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 150);
        }); // adicionando colunas
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            // $table->dropColumn('uf'); // modo individual
            $table->dropColumn('uf', 'email'); // removendo mais de uma coluna por vez
        }); // removendo colunas
    }
};
