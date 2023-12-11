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
        Schema::table('production_info', function($table) {
            $table->text('Production_App_Version')->nullable();
            $table->text('Preset')->nullable();
            $table->text('Created')->nullable();
            $table->text('Microwave_Panel_2')->nullable();
            $table->text('Actuators')->nullable();
            $table->text('User_Interface')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('production_info', function($table) {
            $table->dropColumn('Production_App_Version');
            $table->dropColumn('Preset');
            $table->dropColumn('Created');
            $table->dropColumn('Microwave_Panel_2');
            $table->dropColumn('Actuators');
            $table->dropColumn('User_Interface');
        });
    }
};
