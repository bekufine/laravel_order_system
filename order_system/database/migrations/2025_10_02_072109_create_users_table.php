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
        Schema::table('users', function (Blueprint $table) {
            // Удаляем старую колонку hotel_id (если она есть)
            $table->dropColumn('hotel_id');
            
            // Добавляем внешние ключи
            $table->unsignedInteger('hotel_id'); // ← unsignedInteger, т.к. hotels использует increments
            $table->unsignedInteger('dep_id');   // ← unsignedInteger, т.к. departments использует increments
            $table->unsignedInteger('coor_id');  // ← unsignedInteger, т.к. coordinators использует increments
            
            // Добавляем другие поля
            $table->string('user_logid', 100);
            $table->string('user_logpw', 100);   // ← Убрал дубликат
            $table->string('user_email', 100)->nullable();
            
            // Создаём внешние ключи
            $table->foreign('hotel_id')
                  ->references('hotel_id')
                  ->on('hotels')
                  ->onDelete('cascade');
                  
            $table->foreign('dep_id')
                  ->references('dep_id')
                  ->on('departments')
                  ->onDelete('cascade');
                  
            $table->foreign('coor_id')
                  ->references('coor_id')
                  ->on('coordinators')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Сначала удаляем внешние ключи
            $table->dropForeign(['hotel_id']);
            $table->dropForeign(['dep_id']);
            $table->dropForeign(['coor_id']);
            
            // Затем удаляем колонки
            $table->dropColumn([
                'hotel_id',
                'dep_id', 
                'coor_id',
                'user_logid',
                'user_logpw',
                'user_email'
            ]);
        });
    }
};
