<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up(): void
{
    Schema::create('mahasiswas', function (Blueprint $table) {
        $table->id();
        $table->string('nim');
        $table->string('nama');
        $table->string('no_telp');
        $table->string('email');

        $table->foreignId('id_prodi')
                ->constrained('prodis')
                ->onDelete('cascade');

        $table->string('semester');
        $table->timestamps();
    });
}
public function down(): void
{
Schema::dropIfExists('mahasiswas');
}
};