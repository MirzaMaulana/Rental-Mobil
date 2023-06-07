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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->unsignedBigInteger('unit_id')->nullable(); //boleh kosong
            $table->foreign('unit_id')->references('id')->on('units');
            $table->unsignedBigInteger('driver_id')->nullable(); //boleh kosong
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->boolean('driver');
            $table->string('name');
            $table->string('alamat');
            $table->unsignedBigInteger('nomer_hp');
            $table->integer('days');
            $table->string('total_price');
            $table->string('bukti_image');
            $table->enum('status', ['Pending', 'Disewa', 'Selesai'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
