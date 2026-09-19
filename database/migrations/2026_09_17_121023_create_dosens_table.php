<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up(): void
{
    Schema::create('dosens', function (Blueprint $table) {
        $table->id();
        $table->string('nip', 18)->unique();
        $table->string('nama', 100);
        $table->string('tempat_lahir', 50);
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->string('agama', 20);
        $table->text('alamat');
        $table->string('no_telp');
        $table->string('email');
        $table->enum('pendidikan_terakhir', ['S2', 'S3']);
        $table->timestamps();
    });
}
public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};