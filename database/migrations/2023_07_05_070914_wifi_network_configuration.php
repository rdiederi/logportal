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
        if (!Schema::hasTable('wifi_network_configuration')) {
            Schema::create('wifi_network_configuration', function($table){
                $table->id();
                $table->timestamps();

                $table->bigInteger('sensor_id')->unsigned()->index()->nullable();
                $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');

                $table->text('Interface_Enabled')->nullable();
                $table->text('Interface_DHCP_Client_Enabled')->nullable();
                $table->text('Interface_User_Defined_MAC')->nullable();
                $table->text('Interface_Is_Wifi')->nullable();
                $table->text('Interface_DHCP_Server_Enabled')->nullable();
                $table->text('Interface_Is_Default')->nullable();
                $table->text('IP_Address[0]')->nullable();
                $table->text('IP_Address[1]')->nullable();
                $table->text('IP_Address[2]')->nullable();
                $table->text('IP_Address[3]')->nullable();
                $table->text('Netmask[0]')->nullable();
                $table->text('Netmask[1]')->nullable();
                $table->text('Netmask[2]')->nullable();
                $table->text('Netmask[3]')->nullable();
                $table->text('Gateway[0]')->nullable();
                $table->text('Gateway[1]')->nullable();
                $table->text('Gateway[2]')->nullable();
                $table->text('Gateway[3]')->nullable();
                $table->text('MAC[0]')->nullable();
                $table->text('MAC[1]')->nullable();
                $table->text('MAC[2]')->nullable();
                $table->text('MAC[3]')->nullable();
                $table->text('MAC[4]')->nullable();
                $table->text('MAC[5]')->nullable();
                $table->text('Wifi_is_AP_Client')->nullable();
                $table->text('Wifi_AP_5Ghz')->nullable();
                $table->text('Wifi_SSID')->nullable();
                $table->text('Wifi_Password')->nullable();
                $table->text('Wifi_Channel')->nullable();
           });
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wifi_network_configuration');
    }
};
