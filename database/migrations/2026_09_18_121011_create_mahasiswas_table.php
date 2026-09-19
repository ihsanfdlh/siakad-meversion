<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
public function up(): void
{
    Schema::create('mahasiswas', function (Blueprint $table) {
        $table->id('id_mahasiswa');
        $table->string('nim', 20)->unique();
        $table->string('nama', 100);
        $table->string('tempat_lahir', 50);
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
        $table->string('agama', 20);
        $table->text('alamat');
        $table->string('no_telp', 20);
        $table->string('email', 100)->unique();
        $table->year('angkatan');
        $table->string('semester', 2);
        $table->foreignId('id_prodi')
            ->constrained('prodis')
            ->onDelete('cascade');
        $table->timestamps();
    });
}
public function down(): void
{
Schema::dropIfExists('mahasiswas');
}
};