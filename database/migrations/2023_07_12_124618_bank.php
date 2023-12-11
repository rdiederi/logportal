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
        if (!Schema::hasTable('bank')) {
            Schema::create('bank', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('BANK_#0_DCIF_Base_Frequency')->nullable();
                $table->text('BANK_#0_DCIF_CH0_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH1_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH2_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH3_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH4_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH5_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH6_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH7_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH8_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH9_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH10_(a_b_c)')->nullable();
                $table->text('BANK_#0_DCIF_CH11_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_Base_Frequency')->nullable();
                $table->text('BANK_#1_DCIF_CH0_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH1_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH2_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH3_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH4_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH5_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH6_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH7_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH8_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH9_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH10_(a_b_c)')->nullable();
                $table->text('BANK_#1_DCIF_CH11_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_Base_Frequency')->nullable();
                $table->text('BANK_#2_DCIF_CH0_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH1_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH2_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH3_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH4_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH5_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH6_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH7_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH8_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH9_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH10_(a_b_c)')->nullable();
                $table->text('BANK_#2_DCIF_CH11_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_Base_Frequency')->nullable();
                $table->text('BANK_#3_DCIF_CH0_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH1_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH2_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH3_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH4_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH5_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH6_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH7_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH8_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH9_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH10_(a_b_c)')->nullable();
                $table->text('BANK_#3_DCIF_CH11_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_Base_Frequency')->nullable();
                $table->text('BANK_#4_DCIF_CH0_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH1_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH2_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH3_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH4_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH5_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH6_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH7_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH8_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH9_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH10_(a_b_c)')->nullable();
                $table->text('BANK_#4_DCIF_CH11_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_Base_Frequency')->nullable();
                $table->text('BANK_#5_DCIF_CH0_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH1_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH2_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH3_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH4_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH5_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH6_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH7_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH8_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH9_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH10_(a_b_c)')->nullable();
                $table->text('BANK_#5_DCIF_CH11_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_Base_Frequency')->nullable();
                $table->text('BANK_#6_DCIF_CH0_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH1_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH2_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH3_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH4_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH5_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH6_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH7_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH8_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH9_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH10_(a_b_c)')->nullable();
                $table->text('BANK_#6_DCIF_CH11_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_Base_Frequency')->nullable();
                $table->text('BANK_#7_DCIF_CH0_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH1_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH2_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH3_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH4_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH5_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH6_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH7_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH8_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH9_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH10_(a_b_c)')->nullable();
                $table->text('BANK_#7_DCIF_CH11_(a_b_c)')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank');
    }
};
