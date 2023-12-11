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
        if (!Schema::hasTable('wireless_avr')) {
            Schema::create('wireless_avr', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Hardware_ID')->nullable();
                $table->text('Boot_Manager_Version')->nullable();
                $table->text('Firmware_Version')->nullable();
                $table->text('Revision_ID')->nullable();
                $table->text('Board_Build_Version')->nullable();
                $table->text('Hardware_Type_ID')->nullable();
                $table->text('Oscillator_Frequency')->nullable();
                $table->text('Oscillator_Multiplier')->nullable();
                $table->text('Fuse_And_Lock_Bits')->nullable();
                $table->text('PLD_Version')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wireless_avr');
    }
};
