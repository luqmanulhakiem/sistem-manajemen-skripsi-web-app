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
            $table->bigInteger('id_dospem1')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->bigInteger('id_dospem2')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->string('judul');
            $table->string('komentar')->nullable();
            $table->enum('status', ['diajukan', 'revisi', 'ditolak', 'diajukanUlang'])->default('diajukan');
            $table->enum('status_dosen1', ['diterima', 'ditolak', 'diajukan'])->nullable();
            $table->enum('status_dosen2', ['diterima', 'ditolak', 'diajukan'])->nullable();
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
