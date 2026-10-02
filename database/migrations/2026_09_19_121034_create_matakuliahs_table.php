<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id();

            $table->string('kode_mk');
            $table->string('nama_mk');
            $table->integer('sks');
            $table->integer('semester');

            $table->foreignId('dosen_id')
                ->constrained('dosens')
                ->onDelete('cascade');

            $table->foreignId('id_prodi')
                ->constrained('prodis')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matakuliahs');
    }
};