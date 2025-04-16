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
        Schema::create('audits', function (Blueprint $table) {
            $table->integer('id_audit')->autoIncrement();
            $table->string('action');
            $table->string('model'); 
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('user_id'); 
            $table->text('old_data')->nullable(); 
            $table->text('new_data')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
