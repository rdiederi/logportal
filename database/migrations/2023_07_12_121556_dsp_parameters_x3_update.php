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
        Schema::table('dsp_parameters', function($table) {
            $table->text('Parameter_File_Name')->nullable();
            $table->text('PLD_Version')->nullable();
            $table->text('Antenna_Frequency')->nullable();
            $table->text('Tilt')->nullable();
            $table->text('Tilt_Offset')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dsp_parameters', function($table) {
            $table->dropColumn('Parameter_File_Name');
            $table->dropColumn('PLD_Version');
            $table->dropColumn('Antenna_Frequency');
            $table->dropColumn('Tilt');
            $table->dropColumn('Tilt_Offset');
        });
    }
};
