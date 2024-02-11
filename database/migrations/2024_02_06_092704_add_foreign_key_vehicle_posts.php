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
            $table->foreign('vehicle_type_id')->references('id')->on('m_vehicle_types')->cascadeOnDelete();
            $table->foreign('transmission_type_id')->references('id')->on('m_transmission_types')->cascadeOnDelete();
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
