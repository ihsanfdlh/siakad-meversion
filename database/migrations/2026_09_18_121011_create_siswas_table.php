<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up(): void
{
    Schema::create('siswas', function (Blueprint $table) {
        $table->id();
        $table->string('nim', 20);
        $table->string('nama', 100);
        $table->string('prodi');
        $table->string('semester', 2);
    });
}
public function down(): void
{
Schema::dropIfExists('siswas');
}
};