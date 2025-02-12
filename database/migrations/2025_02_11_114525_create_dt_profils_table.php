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
        Schema::create('dt_profils', function (Blueprint $table) {
            $table->integer('id_profil')->autoIncrement();
            $table->integer('id_user');
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('kontak');
            $table->string('deskripsi_perusahaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_profils');
    }
};
