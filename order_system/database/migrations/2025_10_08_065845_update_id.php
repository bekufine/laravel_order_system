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
        Schema::table('coordinators', function (Blueprint $t) {
            $t->renameColumn('coor_id', 'id');
        });
        Schema::table('hotels', function (Blueprint $t) {
            $t->renameColumn('hotel_id', 'id');
        });
        Schema::table('departments', function (Blueprint $t) {
            $t->renameColumn('dep_id', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
