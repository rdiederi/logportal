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
        if (!Schema::hasTable('avr_tilt_calobration')) {
            Schema::create('avr_tilt_calobration', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Flags')->nullable();
                $table->text('Tilt_Slope')->nullable();
                $table->text('Tilt_Offset')->nullable();
                $table->text('Roll_Slope')->nullable();
                $table->text('Roll_Offset')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avr_tilt_calobration');
    }
};
