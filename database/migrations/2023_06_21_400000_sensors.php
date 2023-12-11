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
        if (!Schema::hasTable('sensors')) {
            Schema::create('sensors', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('user_id')->unsigned()->index()->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                $table->text('Device_Type')->nullable();
                $table->text('Date_Time_of_log_created')->nullable();
                $table->text('S/N')->nullable();
                $table->text('Build_Type_Region')->nullable();
                $table->text('Production_App_Version')->nullable();
                $table->text('Scanned_Barcodes_Data:')->nullable();
                $table->text('Sensor')->nullable();
                $table->text('Transceiver')->nullable();
                $table->text('PCB_Serial')->nullable();
                $table->text('PCB_Issue')->nullable();
                $table->text('Sensor_Serial_Barcode')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
