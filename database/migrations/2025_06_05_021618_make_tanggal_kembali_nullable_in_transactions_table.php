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
        // Run when do migrate
        Schema::table('transactions', function (Blueprint $table) {
            $table->date('tanggal_kembali')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Run when do rollback
        Schema::table('transactions', function (Blueprint $table) {
            $table->date('tanggal_kembali')->change();
        });
    }
};
