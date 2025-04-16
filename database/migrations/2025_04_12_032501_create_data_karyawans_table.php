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
        Schema::create('data_karyawans', function (Blueprint $table) {

            $table->integer('id_karyawan')->autoIncrement();
            $table->integer('id_departemen');
            $table->integer('id');
            $table->string('kode_karyawan');
            $table->string('departemen');
            $table->string('nama_karyawan');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('email');
            $table->string('sekolah');
            $table->string('jurusan');
            $table->string('linkmedsos');
            $table->string('dokumen')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_karyawans');
    }
};
