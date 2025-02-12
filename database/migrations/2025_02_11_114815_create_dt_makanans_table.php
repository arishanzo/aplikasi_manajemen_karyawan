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
        Schema::create('dt_makanans', function (Blueprint $table) {
            $table->integer('id_makanan')->autoIncrement();
            $table->integer('id_profil');
            $table->integer('id_user');
             $table->string('makanan');
             $table->string('jenis_makanan');
             $table->string('deskripsi');
             $table->string('foto')->nullable();
             $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_makanans');
    }
};
