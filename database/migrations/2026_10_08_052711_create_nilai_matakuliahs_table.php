<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_matakuliahs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('matakuliah_id');

            $table->decimal('nilai', 5, 2);

            $table->timestamps();

            $table->foreign('mahasiswa_id')
                ->references('id_mahasiswa')
                ->on('mahasiswas')
                ->cascadeOnDelete();

            $table->foreign('matakuliah_id')
                ->references('id')
                ->on('matakuliahs')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_matakuliahs');
    }
};