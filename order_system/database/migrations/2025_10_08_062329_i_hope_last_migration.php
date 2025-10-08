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
            $table->id('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('coor_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('coor_id')
                  ->references('coor_id')
                  ->on('coordinators')
                  ->onDelete('cascade');
            $table->date('event_date');
            $table->time('work_start_time');
            $table->time('work_end_time');
            $table->string('venue_name');
            $table->time('event_start_time');
            $table->time('event_end_time');
            $table->integer('guests_number');
            $table->text('duty_content');
            $table->string('position');
            $table->text('comments')->nullable();
            $table->timestamps();
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
