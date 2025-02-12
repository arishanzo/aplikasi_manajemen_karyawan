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
        Schema::create('dt_orders', function (Blueprint $table) {
            $table->integer('id_orders')->autoIncrement();
            $table->integer('id_user');
            $table->integer('id_makanan');
            $table->string('jumlah_porsi');
            $table->date('tgl_pengiriman');
            $table->string('nama_pembeli');
            $table->string('nama_katering');
            $table->string('no_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_orders');
    }
};
