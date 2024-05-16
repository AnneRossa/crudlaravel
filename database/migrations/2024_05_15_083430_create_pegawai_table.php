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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('alamat');
            $table->unsignedBigInteger('kelurahan_id'); // Menambahkan kolom untuk kunci asing kecamatan
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan');
            $table->unsignedBigInteger('kecamatan_id'); // Menambahkan kolom untuk kunci asing kecamatan
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
            $table->unsignedBigInteger('provinsi_id'); // Menambahkan kolom untuk kunci asing kecamatan
            $table->foreign('provinsi_id')->references('id')->on('provinsi');
            $table->boolean('active_kel')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
