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
        if (!Schema::hasTable('files')) {
            Schema::create('files', function (Blueprint $table) {
                $table->id();
    
                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');
    
                $table->string('name');
                $table->binary('content', 4294967295);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
