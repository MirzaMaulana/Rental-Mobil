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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->enum('type', ['Hatchback', 'Sedan', 'SUV', 'MPV']);
            $table->integer('seats');
            $table->integer('price');
            $table->string('bensin');
            $table->string('gear');
            $table->unsignedBigInteger('jumlah_unit');
            $table->enum('status', ['Tersedia', 'Disewa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
