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
        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('reason_contacts_id')->after('message');
        });

        DB::statement('UPDATE contacts set reason_contacts_id=type');

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('reason_contacts_id')->references('id')->on('reason_contacts');
            $table->dropColumn('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->integer('type');
        });

        DB::statement('UPDATE contacts set type=reason_contacts_id');

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign('contacts_reason_contacts_id_foreign')->references('id')->on('reason_contacts');
            $table->dropColumn('reason_contacts_id');

        });


    }
};
