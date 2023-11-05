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
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('descrição');     
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->text('descricao')->nullable()->after('nome');     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('descricao');     
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->text('descrição')->after('nome');     
        });
    }
};
