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
        Schema::create('pengajuan_juduls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_mahasiswa')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('judul');
            $table->string('komentar')->nullable();
            $table->enum('status', ['diajukan', 'revisi', 'ditolak', 'diajukanUlang', 'diterima'])->default('diajukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_juduls');
    }
};
