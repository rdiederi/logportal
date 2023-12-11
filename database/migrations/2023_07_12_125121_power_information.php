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
        if (!Schema::hasTable('power_information')) {
            Schema::create('power_information', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Capacity')->nullable();
                $table->text('Charge_Level_Set')->nullable();
                $table->text('Charge_Level')->nullable();
                $table->text('Power_Levels')->nullable();
                $table->text('Power_In_Use_(not_charging)_V/A')->nullable();
                $table->text('Power_In_Use_(charging)_V/A')->nullable();
                $table->text('Battery_In_Use_V/A')->nullable();
                $table->text('Battery_Temperature')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('power_information');
    }};
