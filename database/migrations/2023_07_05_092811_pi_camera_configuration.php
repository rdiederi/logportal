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
        if (!Schema::hasTable('pi_camera_configuration')) {
            Schema::create('pi_camera_configuration', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Cam_Width')->nullable();
                $table->text('Cam_Height')->nullable();
                $table->text('Cam_Rotation')->nullable();
                $table->text('Cam_EV')->nullable();
                $table->text('Cam_Quality')->nullable();
                $table->text('Cam_FPS')->nullable();
                $table->text('Cam_Stream_Rate')->nullable();
                $table->text('Cam_Prebuffer_Time_(ms)')->nullable();
                $table->text('Cam_Postbuffer_Time_(ms)')->nullable();
                $table->text('Cam_Read/Write_Dynamic_Config')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pi_camera_configuration');
    }
};
