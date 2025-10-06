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
        Schema::create('department_users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->unsignedInteger('dep_id');
            $table->string('user_logid', 100);
            $table->string('user_pw', 100);
            $table->foreign('dep_id')
                  ->references('dep_id')
                  ->on('departments')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_users');
    }
};
