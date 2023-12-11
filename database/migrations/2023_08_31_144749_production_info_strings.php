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
        if (!Schema::hasTable('production_info_strings')) {
            Schema::create('production_info_strings', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('production_info_string[0]')->nullable();
                $table->text('production_info_string[1]')->nullable();
                $table->text('production_info_string[2]')->nullable();
                $table->text('production_info_string[3]')->nullable();
                $table->text('production_info_string[4]')->nullable();
                $table->text('production_info_string[5]')->nullable();
                $table->text('production_info_string[6]')->nullable();
                $table->text('production_info_string[7]')->nullable();
                $table->text('production_info_string[8]')->nullable();
                $table->text('production_info_string[9]')->nullable();
                $table->text('production_info_string[10]')->nullable();
                $table->text('production_info_string[11]')->nullable();
                $table->text('production_info_string[12]')->nullable();
                $table->text('production_info_string[13]')->nullable();
                $table->text('production_info_string[14]')->nullable();
                $table->text('production_info_string[15]')->nullable();
                $table->text('production_info_string[16]')->nullable();
                $table->text('production_info_string[17]')->nullable();
                $table->text('production_info_string[18]')->nullable();
                $table->text('production_info_string[19]')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_info_strings');
    }
};
