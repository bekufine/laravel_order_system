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
            $table->id("order_id");
            $table->unsignedInteger("coor_id");
            $table->unsignedInteger("user_id");
            $table->date("event_date");
            $table->string("work_start_time");
            $table->string("work_end_time");
            $table->string("venue_name");
            $table->string("event_start_time");
            $table->string("event_end_time");
            $table->string("guests_number");
            $table->string("duty_content");
            $table->string("position");
            $table->string("comments");
            $table->timestamps();
            $table->foreignId('coor_id')->references('coor_id')->on('coordinators');
            $table->foreignId('user_id')->references('id')->on('users');
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
