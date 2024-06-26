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
        Schema::create('pemakaian', function (Blueprint $table) {
            $table->increments('id_pemakaian');
            $table->unsignedInteger('id_users');
            $table->unsignedInteger('id_guru');
            $table->unsignedInteger('id_karyawan');
            $table->enum('status', ['siswa', 'karyawan', 'guru']);
            $table->date('tgl_pakai');
            $table->string('keterangan_pemakaian')->nullable();
            $table->foreign('id_users')->references('id_users')->on('users')->onDelete('cascade');
            $table->foreign('id_guru')->references('id_guru')->on('guru')->onDelete('cascade');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemakaian');
    }
};