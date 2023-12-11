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
        if (!Schema::hasTable('cam_mode_2')) {
            Schema::create('cam_mode_2', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Cam_Mode[6]_Name')->nullable();
                $table->text('Cam_Mode[6]_Width')->nullable();
                $table->text('Cam_Mode[6]_Height')->nullable();
                $table->text('Cam_Mode[6]_XScale')->nullable();
                $table->text('Cam_Mode[6]_XOffset')->nullable();
                $table->text('Cam_Mode[6]_YScale')->nullable();
                $table->text('Cam_Mode[6]_YOffset')->nullable();
                $table->text('Cam_Mode[6]_FusionMode')->nullable();
                $table->text('Cam_Mode[6]_Bin44')->nullable();
                $table->text('Cam_Mode[6]_RoiU')->nullable();
                $table->text('Cam_Mode[6]_RoiV')->nullable();
                $table->text('Cam_Mode[6]_Rotation')->nullable();
                $table->text('Cam_Mode[6]_RoiWidth')->nullable();
                $table->text('Cam_Mode[6]_RoiHeight')->nullable();
                $table->text('Cam_Mode[6]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[6]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[7]_Name')->nullable();
                $table->text('Cam_Mode[7]_Width')->nullable();
                $table->text('Cam_Mode[7]_Height')->nullable();
                $table->text('Cam_Mode[7]_XScale')->nullable();
                $table->text('Cam_Mode[7]_XOffset')->nullable();
                $table->text('Cam_Mode[7]_YScale')->nullable();
                $table->text('Cam_Mode[7]_YOffset')->nullable();
                $table->text('Cam_Mode[7]_FusionMode')->nullable();
                $table->text('Cam_Mode[7]_Bin44')->nullable();
                $table->text('Cam_Mode[7]_RoiU')->nullable();
                $table->text('Cam_Mode[7]_RoiV')->nullable();
                $table->text('Cam_Mode[7]_Rotation')->nullable();
                $table->text('Cam_Mode[7]_RoiWidth')->nullable();
                $table->text('Cam_Mode[7]_RoiHeight')->nullable();
                $table->text('Cam_Mode[7]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[7]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[8]_Name')->nullable();
                $table->text('Cam_Mode[8]_Width')->nullable();
                $table->text('Cam_Mode[8]_Height')->nullable();
                $table->text('Cam_Mode[8]_XScale')->nullable();
                $table->text('Cam_Mode[8]_XOffset')->nullable();
                $table->text('Cam_Mode[8]_YScale')->nullable();
                $table->text('Cam_Mode[8]_YOffset')->nullable();
                $table->text('Cam_Mode[8]_FusionMode')->nullable();
                $table->text('Cam_Mode[8]_Bin44')->nullable();
                $table->text('Cam_Mode[8]_RoiU')->nullable();
                $table->text('Cam_Mode[8]_RoiV')->nullable();
                $table->text('Cam_Mode[8]_Rotation')->nullable();
                $table->text('Cam_Mode[8]_RoiWidth')->nullable();
                $table->text('Cam_Mode[8]_RoiHeight')->nullable();
                $table->text('Cam_Mode[8]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[8]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[9]_Name')->nullable();
                $table->text('Cam_Mode[9]_Width')->nullable();
                $table->text('Cam_Mode[9]_Height')->nullable();
                $table->text('Cam_Mode[9]_XScale')->nullable();
                $table->text('Cam_Mode[9]_XOffset')->nullable();
                $table->text('Cam_Mode[9]_YScale')->nullable();
                $table->text('Cam_Mode[9]_YOffset')->nullable();
                $table->text('Cam_Mode[9]_FusionMode')->nullable();
                $table->text('Cam_Mode[9]_Bin44')->nullable();
                $table->text('Cam_Mode[9]_RoiU')->nullable();
                $table->text('Cam_Mode[9]_RoiV')->nullable();
                $table->text('Cam_Mode[9]_Rotation')->nullable();
                $table->text('Cam_Mode[9]_RoiWidth')->nullable();
                $table->text('Cam_Mode[9]_RoiHeight')->nullable();
                $table->text('Cam_Mode[9]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[9]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[10]_Name')->nullable();
                $table->text('Cam_Mode[10]_Width')->nullable();
                $table->text('Cam_Mode[10]_Height')->nullable();
                $table->text('Cam_Mode[10]_XScale')->nullable();
                $table->text('Cam_Mode[10]_XOffset')->nullable();
                $table->text('Cam_Mode[10]_YScale')->nullable();
                $table->text('Cam_Mode[10]_YOffset')->nullable();
                $table->text('Cam_Mode[10]_FusionMode')->nullable();
                $table->text('Cam_Mode[10]_Bin44')->nullable();
                $table->text('Cam_Mode[10]_RoiU')->nullable();
                $table->text('Cam_Mode[10]_RoiV')->nullable();
                $table->text('Cam_Mode[10]_Rotation')->nullable();
                $table->text('Cam_Mode[10]_RoiWidth')->nullable();
                $table->text('Cam_Mode[10]_RoiHeight')->nullable();
                $table->text('Cam_Mode[10]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[10]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[11]_Name')->nullable();
                $table->text('Cam_Mode[11]_Width')->nullable();
                $table->text('Cam_Mode[11]_Height')->nullable();
                $table->text('Cam_Mode[11]_XScale')->nullable();
                $table->text('Cam_Mode[11]_XOffset')->nullable();
                $table->text('Cam_Mode[11]_YScale')->nullable();
                $table->text('Cam_Mode[11]_YOffset')->nullable();
                $table->text('Cam_Mode[11]_FusionMode')->nullable();
                $table->text('Cam_Mode[11]_Bin44')->nullable();
                $table->text('Cam_Mode[11]_RoiU')->nullable();
                $table->text('Cam_Mode[11]_RoiV')->nullable();
                $table->text('Cam_Mode[11]_Rotation')->nullable();
                $table->text('Cam_Mode[11]_RoiWidth')->nullable();
                $table->text('Cam_Mode[11]_RoiHeight')->nullable();
                $table->text('Cam_Mode[11]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[11]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[12]_Name')->nullable();
                $table->text('Cam_Mode[12]_Width')->nullable();
                $table->text('Cam_Mode[12]_Height')->nullable();
                $table->text('Cam_Mode[12]_XScale')->nullable();
                $table->text('Cam_Mode[12]_XOffset')->nullable();
                $table->text('Cam_Mode[12]_YScale')->nullable();
                $table->text('Cam_Mode[12]_YOffset')->nullable();
                $table->text('Cam_Mode[12]_FusionMode')->nullable();
                $table->text('Cam_Mode[12]_Bin44')->nullable();
                $table->text('Cam_Mode[12]_RoiU')->nullable();
                $table->text('Cam_Mode[12]_RoiV')->nullable();
                $table->text('Cam_Mode[12]_Rotation')->nullable();
                $table->text('Cam_Mode[12]_RoiWidth')->nullable();
                $table->text('Cam_Mode[12]_RoiHeight')->nullable();
                $table->text('Cam_Mode[12]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[12]_TimeErrorVCoef_ms')->nullable();
                $table->text('Cam_Mode[13]_Name')->nullable();
                $table->text('Cam_Mode[13]_Width')->nullable();
                $table->text('Cam_Mode[13]_Height')->nullable();
                $table->text('Cam_Mode[13]_XScale')->nullable();
                $table->text('Cam_Mode[13]_XOffset')->nullable();
                $table->text('Cam_Mode[13]_YScale')->nullable();
                $table->text('Cam_Mode[13]_YOffset')->nullable();
                $table->text('Cam_Mode[13]_FusionMode')->nullable();
                $table->text('Cam_Mode[13]_Bin44')->nullable();
                $table->text('Cam_Mode[13]_RoiU')->nullable();
                $table->text('Cam_Mode[13]_RoiV')->nullable();
                $table->text('Cam_Mode[13]_Rotation')->nullable();
                $table->text('Cam_Mode[13]_RoiWidth')->nullable();
                $table->text('Cam_Mode[13]_RoiHeight')->nullable();
                $table->text('Cam_Mode[13]_TimeErrorConst_ms')->nullable();
                $table->text('Cam_Mode[13]_TimeErrorVCoef_ms')->nullable();
            });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cam_mode_2');
    }
};