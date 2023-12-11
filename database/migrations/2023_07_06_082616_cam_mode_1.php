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
        if (!Schema::hasTable('cam_mode_1')) {
            Schema::create('cam_mode_1', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Cam_Mode[0]_Name')->nullable();
                $table->text('Cam_Mode[0]_Width')->nullable();
                $table->text('Cam_Mode[0]_Height')->nullable();
                $table->text('Cam_Mode[0]_XScale')->nullable();
                $table->text('Cam_Mode[0]_XOffset')->nullable();
                $table->text('Cam_Mode[0]_YScale')->nullable();
                $table->text('Cam_Mode[0]_YOffset')->nullable();
                $table->text('Cam_Mode[0]_FusionMode')->nullable();
                $table->text('Cam_Mode[0]_Bin44')->nullable();
                $table->text('Cam_Mode[0]_RoiU')->nullable();
                $table->text('Cam_Mode[0]_RoiV')->nullable();
                $table->text('Cam_Mode[0]_Rotation')->nullable();
                $table->text('Cam_Mode[0]_RoiWidth')->nullable();
                $table->text('Cam_Mode[0]_RoiHeight')->nullable();
                $table->text('Cam_Mode[0]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[0]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[1]_Name')->nullable();
                $table->text('Cam_Mode[1]_Width')->nullable();
                $table->text('Cam_Mode[1]_Height')->nullable();
                $table->text('Cam_Mode[1]_XScale')->nullable();
                $table->text('Cam_Mode[1]_XOffset')->nullable();
                $table->text('Cam_Mode[1]_YScale')->nullable();
                $table->text('Cam_Mode[1]_YOffset')->nullable();
                $table->text('Cam_Mode[1]_FusionMode')->nullable();
                $table->text('Cam_Mode[1]_Bin44')->nullable();
                $table->text('Cam_Mode[1]_RoiU')->nullable();
                $table->text('Cam_Mode[1]_RoiV')->nullable();
                $table->text('Cam_Mode[1]_Rotation')->nullable();
                $table->text('Cam_Mode[1]_RoiWidth')->nullable();
                $table->text('Cam_Mode[1]_RoiHeight')->nullable();
                $table->text('Cam_Mode[1]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[1]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[2]_Name')->nullable();
                $table->text('Cam_Mode[2]_Width')->nullable();
                $table->text('Cam_Mode[2]_Height')->nullable();
                $table->text('Cam_Mode[2]_XScale')->nullable();
                $table->text('Cam_Mode[2]_XOffset')->nullable();
                $table->text('Cam_Mode[2]_YScale')->nullable();
                $table->text('Cam_Mode[2]_YOffset')->nullable();
                $table->text('Cam_Mode[2]_FusionMode')->nullable();
                $table->text('Cam_Mode[2]_Bin44')->nullable();
                $table->text('Cam_Mode[2]_RoiU')->nullable();
                $table->text('Cam_Mode[2]_RoiV')->nullable();
                $table->text('Cam_Mode[2]_Rotation')->nullable();
                $table->text('Cam_Mode[2]_RoiWidth')->nullable();
                $table->text('Cam_Mode[2]_RoiHeight')->nullable();
                $table->text('Cam_Mode[2]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[2]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[3]_Name')->nullable();
                $table->text('Cam_Mode[3]_Width')->nullable();
                $table->text('Cam_Mode[3]_Height')->nullable();
                $table->text('Cam_Mode[3]_XScale')->nullable();
                $table->text('Cam_Mode[3]_XOffset')->nullable();
                $table->text('Cam_Mode[3]_YScale')->nullable();
                $table->text('Cam_Mode[3]_YOffset')->nullable();
                $table->text('Cam_Mode[3]_FusionMode')->nullable();
                $table->text('Cam_Mode[3]_Bin44')->nullable();
                $table->text('Cam_Mode[3]_RoiU')->nullable();
                $table->text('Cam_Mode[3]_RoiV')->nullable();
                $table->text('Cam_Mode[3]_Rotation')->nullable();
                $table->text('Cam_Mode[3]_RoiWidth')->nullable();
                $table->text('Cam_Mode[3]_RoiHeight')->nullable();
                $table->text('Cam_Mode[3]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[3]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[4]_Name')->nullable();
                $table->text('Cam_Mode[4]_Width')->nullable();
                $table->text('Cam_Mode[4]_Height')->nullable();
                $table->text('Cam_Mode[4]_XScale')->nullable();
                $table->text('Cam_Mode[4]_XOffset')->nullable();
                $table->text('Cam_Mode[4]_YScale')->nullable();
                $table->text('Cam_Mode[4]_YOffset')->nullable();
                $table->text('Cam_Mode[4]_FusionMode')->nullable();
                $table->text('Cam_Mode[4]_Bin44')->nullable();
                $table->text('Cam_Mode[4]_RoiU')->nullable();
                $table->text('Cam_Mode[4]_RoiV')->nullable();
                $table->text('Cam_Mode[4]_Rotation')->nullable();
                $table->text('Cam_Mode[4]_RoiWidth')->nullable();
                $table->text('Cam_Mode[4]_RoiHeight')->nullable();
                $table->text('Cam_Mode[4]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[4]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[5]_Name')->nullable();
                $table->text('Cam_Mode[5]_Width')->nullable();
                $table->text('Cam_Mode[5]_Height')->nullable();
                $table->text('Cam_Mode[5]_XScale')->nullable();
                $table->text('Cam_Mode[5]_XOffset')->nullable();
                $table->text('Cam_Mode[5]_YScale')->nullable();
                $table->text('Cam_Mode[5]_YOffset')->nullable();
                $table->text('Cam_Mode[5]_FusionMode')->nullable();
                $table->text('Cam_Mode[5]_Bin44')->nullable();
                $table->text('Cam_Mode[5]_RoiU')->nullable();
                $table->text('Cam_Mode[5]_RoiV')->nullable();
                $table->text('Cam_Mode[5]_Rotation')->nullable();
                $table->text('Cam_Mode[5]_RoiWidth')->nullable();
                $table->text('Cam_Mode[5]_RoiHeight')->nullable();
                $table->text('Cam_Mode[5]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[5]_TimeErrorVCoef_ms')->nullable();
            });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cam_mode_1');
    }
};
