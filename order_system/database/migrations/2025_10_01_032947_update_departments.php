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
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('dep_id'); // Первичный ключ лучше указать первым
            $table->unsignedInteger('hotel_id');
            $table->string('name'); // Добавьте название департамента
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('hotel_id')
                  ->references('hotel_id')
                  ->on('hotels')
                  ->onDelete('cascade');
            
            // Опционально: индекс для быстрого поиска
            // $table->index('hotel_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};