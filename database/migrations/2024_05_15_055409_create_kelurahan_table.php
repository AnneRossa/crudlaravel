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
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kel')->unique();
            $table->string('nama_kelurahan');
            $table->unsignedBigInteger('kecamatan_id'); // Menambahkan kolom untuk kunci asing kecamatan
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
            $table->boolean('active_kel')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahan');
    }
};
