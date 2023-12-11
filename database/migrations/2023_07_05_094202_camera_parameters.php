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
        if (!Schema::hasTable('camera_parameters')) {
            Schema::create('camera_parameters', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Cam_Structure_Version')->nullable();
                $table->text('Cam_Flags')->nullable();
                $table->text('Cam_Location_ID')->nullable();
                $table->text('Cam_Host_Software')->nullable();
                $table->text('Cam_Date,_Time')->nullable();
                $table->text('Cam_Width')->nullable();
                $table->text('Cam_Height')->nullable();
                $table->text('Cam_Focal_Length_Fx')->nullable();
                $table->text('Cam_Focal_Length_Fy')->nullable();
                $table->text('Cam_Principle_Point_Cx')->nullable();
                $table->text('Cam_Principle_Point_Cy')->nullable();
                $table->text('Cam_Distortion0')->nullable();
                $table->text('Cam_Distortion1')->nullable();
                $table->text('Cam_Distortion2')->nullable();
                $table->text('Cam_Distortion3')->nullable();
                $table->text('Cam_Distortion4')->nullable();
                $table->text('Cam_Distortion5')->nullable();
                $table->text('Cam_Distortion6')->nullable();
                $table->text('Cam_Distortion7')->nullable();
                $table->text('Cam_Position_X')->nullable();
                $table->text('Cam_Position_Y')->nullable();
                $table->text('Cam_Position_Z')->nullable();
                $table->text('Cam_Rotation_X')->nullable();
                $table->text('Cam_Rotation_Y')->nullable();
                $table->text('Cam_Rotation_Z')->nullable();
            });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camera_parameters');
    }
};
