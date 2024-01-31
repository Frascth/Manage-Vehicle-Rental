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
        Schema::create('vehicle_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->smallInteger('vehicle_type');
            $table->string('model', 250);
            $table->smallInteger('transmission_type')->default(1);
            $table->smallInteger('door_count')->default(0);
            $table->smallInteger('seat_count')->default(1);
            $table->smallInteger('max_fuel')->default(1);
            $table->smallInteger('curr_fuel')->default(0);
            $table->integer('fuel_efficiency')->default(10);
            $table->date('manufactur_date');
            $table->bigInteger('usage_time');
            $table->unsignedBigInteger('owner_id');
            $table->bigInteger('price');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('m_vehicle_brand')->cascadeOnDelete();
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_posts');
    }
};
