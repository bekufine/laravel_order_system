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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('dep_id');
            $table->unsignedBigInteger('coor_id');
            $table->date('event_date');
            $table->time('work_start_time');
            $table->time('work_end_time');
            $table->integer('workers_number');
            $table->string('venue_name');
            $table->time('event_start_time');
            $table->time('event_end_time');
            $table->mediumText('duty_content');
            $table->string('position');
            $table->mediumText('duty_content');
            $table->timestamps();
            $table->foreign('hotel_id')
                  ->references('id')
                  ->on('hotels')
                  ->onDelete('cascade');
            $table->foreign('dep_id')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('cascade');
            $table->foreign('coor_id')
                  ->references('id')
                  ->on('coordinators')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
