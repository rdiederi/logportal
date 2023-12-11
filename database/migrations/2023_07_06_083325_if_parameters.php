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
        if (!Schema::hasTable('if_parameters')) {
            Schema::create('if_parameters', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Flags')->nullable();
                $table->text('Host_Software')->nullable();
                $table->text('Date_Time')->nullable();
                $table->text('Part_No_1')->nullable();
                $table->text('Serial_No')->nullable();
                $table->text('DCIF_Bank_Index')->nullable();
                $table->text('DCIF_Base_Frequency')->nullable();
                $table->text('DCIF_CH0_coef_a')->nullable();
                $table->text('DCIF_CH0_coef_b')->nullable();
                $table->text('DCIF_CH0_coef_c')->nullable();
                $table->text('DCIF_CH1_coef_a')->nullable();
                $table->text('DCIF_CH1_coef_b')->nullable();
                $table->text('DCIF_CH1_coef_c')->nullable();
                $table->text('DCIF_CH2_coef_a')->nullable();
                $table->text('DCIF_CH2_coef_b')->nullable();
                $table->text('DCIF_CH2_coef_c')->nullable();
                $table->text('DCIF_CH3_coef_a')->nullable();
                $table->text('DCIF_CH3_coef_b')->nullable();
                $table->text('DCIF_CH3_coef_c')->nullable();
                $table->text('DCIF_CH4_coef_a')->nullable();
                $table->text('DCIF_CH4_coef_b')->nullable();
                $table->text('DCIF_CH4_coef_c')->nullable();
                $table->text('DCIF_CH5_coef_a')->nullable();
                $table->text('DCIF_CH5_coef_b')->nullable();
                $table->text('DCIF_CH5_coef_c')->nullable();
                $table->text('DCIF_CH6_coef_a')->nullable();
                $table->text('DCIF_CH6_coef_b')->nullable();
                $table->text('DCIF_CH6_coef_c')->nullable();
                $table->text('DCIF_CH7_coef_a')->nullable();
                $table->text('DCIF_CH7_coef_b')->nullable();
                $table->text('DCIF_CH7_coef_c')->nullable();
                $table->text('DCIF_CH8_coef_a')->nullable();
                $table->text('DCIF_CH8_coef_b')->nullable();
                $table->text('DCIF_CH8_coef_c')->nullable();
                $table->text('DCIF_CH9_coef_a')->nullable();
                $table->text('DCIF_CH9_coef_b')->nullable();
                $table->text('DCIF_CH9_coef_c')->nullable();
                $table->text('DCIF_CH10_coef_a')->nullable();
                $table->text('DCIF_CH10_coef_b')->nullable();
                $table->text('DCIF_CH10_coef_c')->nullable();
                $table->text('DCIF_CH11_coef_a')->nullable();
                $table->text('DCIF_CH11_coef_b')->nullable();
                $table->text('DCIF_CH11_coef_c')->nullable();
                $table->text('DCIF_CH12_coef_a')->nullable();
                $table->text('DCIF_CH12_coef_b')->nullable();
                $table->text('DCIF_CH12_coef_c')->nullable();
                $table->text('DCIF_CH13_coef_a')->nullable();
                $table->text('DCIF_CH13_coef_b')->nullable();
                $table->text('DCIF_CH13_coef_c')->nullable();
                $table->text('DCIF_CH14_coef_a')->nullable();
                $table->text('DCIF_CH14_coef_b')->nullable();
                $table->text('DCIF_CH14_coef_c')->nullable();
                $table->text('DCIF_CH15_coef_a')->nullable();
                $table->text('DCIF_CH15_coef_b')->nullable();
                $table->text('DCIF_CH15_coef_c')->nullable();
                $table->text('UW_CH0_Amp')->nullable();
                $table->text('UW_CH1_Amp')->nullable();
                $table->text('UW_CH2_Amp')->nullable();
                $table->text('UW_CH3_Amp')->nullable();
                $table->text('UW_CH4_Amp')->nullable();
                $table->text('UW_CH5_Amp')->nullable();
                $table->text('UW_CH6_Amp')->nullable();
                $table->text('UW_CH7_Amp')->nullable();
                $table->text('UW_CH8_Amp')->nullable();
                $table->text('UW_CH9_Amp')->nullable();
                $table->text('UW_CH10_Amp')->nullable();
                $table->text('UW_CH11_Amp')->nullable();
                $table->text('UW_CH12_Amp')->nullable();
                $table->text('UW_CH13_Amp')->nullable();
                $table->text('UW_CH14_Amp')->nullable();
                $table->text('UW_CH15_Amp')->nullable();
                $table->text('UW_CH0_Phase')->nullable();
                $table->text('UW_CH1_Phase')->nullable();
                $table->text('UW_CH2_Phase')->nullable();
                $table->text('UW_CH3_Phase')->nullable();
                $table->text('UW_CH4_Phase')->nullable();
                $table->text('UW_CH5_Phase')->nullable();
                $table->text('UW_CH6_Phase')->nullable();
                $table->text('UW_CH7_Phase')->nullable();
                $table->text('UW_CH8_Phase')->nullable();
                $table->text('UW_CH9_Phase')->nullable();
                $table->text('UW_CH10_Phase')->nullable();
                $table->text('UW_CH11_Phase')->nullable();
                $table->text('UW_CH12_Phase')->nullable();
                $table->text('UW_CH13_Phase')->nullable();
                $table->text('UW_CH14_Phase')->nullable();
                $table->text('UW_CH15_Phase')->nullable();
                $table->text('Delta_Frequency')->nullable();
            });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('if_parameters');
    }
};
