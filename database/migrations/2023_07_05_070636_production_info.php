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
        if (!Schema::hasTable('production_info')) {
            Schema::create('production_info', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Sensor_Info')->nullable();
                $table->text('PCB_Info')->nullable();
                $table->text('WIFI_Dongle')->nullable();
                $table->text('Microwave_Panel')->nullable();
                $table->text('Camera')->nullable();
                $table->text('Station')->nullable();
                $table->text('Station_ID')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_info');
    }
};
