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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_id')->constrained('books')->cascadeOnDelete(); // All relation tha related with this key will be deleted
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // All relation tha related with this key will be deleted
            $table->date('tanggal_pinjam')->index(); // Index important for filtering. Use index if the column data can be search
            $table->date('tanggal_kembali')->index(); // Index important for filtering. Use index if the column data can be search
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
