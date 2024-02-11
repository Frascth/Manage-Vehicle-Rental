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
        Schema::rename('m_vehicle_brand', 'm_vehicle_brands');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('m_vehicle_brands', 'm_vehicle_brand');
    }
};
