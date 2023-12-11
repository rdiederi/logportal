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
        if (!Schema::hasTable('rf_beam_panel')) {
            Schema::create('rf_beam_panel', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Antenna_F1')->nullable();
                $table->text('Antenna_F2')->nullable();
                $table->text('Strings[0]')->nullable();
                $table->text('Strings[1]')->nullable();
                $table->text('Strings[2]')->nullable();
                $table->text('Strings[3]')->nullable();
                $table->text('Strings[4]')->nullable();
                $table->text('Strings[5]')->nullable();
                $table->text('Strings[6]')->nullable();
                $table->text('Strings[7]')->nullable();
                $table->text('Strings[8]')->nullable();
                $table->text('Strings[9]')->nullable();
                $table->text('Strings[10]')->nullable();
                $table->text('Strings[11]')->nullable();
                $table->text('Strings[12]')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rf_beam_panel');
    }
};
