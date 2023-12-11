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
       Schema::table('rf_beam_panel', function($table) {
            $table->text('Strings[13]')->nullable();
            $table->text('Strings[14]')->nullable();
            $table->text('Strings[15]')->nullable();
            $table->text('Strings[16]')->nullable();
            $table->text('Strings[17]')->nullable();
            $table->text('Strings[18]')->nullable();
            $table->text('Strings[19]')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rf_beam_panel', function($table) {
            $table->dropColumn('Strings[13]');
            $table->dropColumn('Strings[14]');
            $table->dropColumn('Strings[15]');
            $table->dropColumn('Strings[16]');
            $table->dropColumn('Strings[17]');
            $table->dropColumn('Strings[18]');
            $table->dropColumn('Strings[19]');
        });
    }
};
