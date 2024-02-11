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
        //
        Schema::table('vehicle_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_type_id')->change();
            $table->unsignedBigInteger('transmission_type_id')->change();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('vehicle_posts', function (Blueprint $table) {
        });
    }
};
