<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up(): void
{
    Schema::create('jurusans', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('thn_terbit');

        $table->foreignId('id_kajur')
                ->constrained('dosens')
                ->onDelete('cascade');

        $table->foreignId('id_sekjur')
                ->constrained('dosens')
                ->onDelete('cascade');

        $table->timestamps();
    });
}
public function down(): void
{
Schema::dropIfExists('jurusans');
}
};