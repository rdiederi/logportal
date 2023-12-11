<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eth0_Network_Configuration extends Model
{
    use HasFactory;

    protected $table = "eth0_network_configuration";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        'Interface_Enabled',
        'Interface_DHCP_Client_Enabled',
        'Interface_User_Defined_MAC',
        'Interface_Is_Wifi',
        'Interface_DHCP_Server_Enabled',
        'Interface_Is_Default',
        'IP_Address[0]',
        'IP_Address[1]',
        'IP_Address[2]',
        'IP_Address[3]',
        'Netmask[0]',
        'Netmask[1]',
        'Netmask[2]',
        'Netmask[3]',
        'Gateway[0]',
        'Gateway[1]',
        'Gateway[2]',
        'Gateway[3]',
        'MAC[0]',
        'MAC[1]',
        'MAC[2]',
        'MAC[3]',
        'MAC[4]',
        'MAC[5]',
        'Wifi_is_AP_Client',
        'Wifi_AP_5Ghz',
        'Wifi_SSID',
        'Wifi_Password',
        'Wifi_Channel',
        'IP_Mode'
    ];
    /**
     * Get the sensor that owns the dsp_parameters.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
