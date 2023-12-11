<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production_Info_Strings extends Model
{
    use HasFactory;

    protected $table = "production_info_strings";

    protected $primaryKey = "id";

    public $incrementing = true;

    protected $fillable = [
        "production_info_string[0]",
        "production_info_string[1]",
        "production_info_string[2]",
        "production_info_string[3]",
        "production_info_string[4]",
        "production_info_string[5]",
        "production_info_string[6]",
        "production_info_string[7]",
        "production_info_string[8]",
        "production_info_string[9]",
        "production_info_string[10]",
        "production_info_string[11]",
        "production_info_string[12]",
        "production_info_string[13]",
        "production_info_string[14]",
        "production_info_string[15]",
        "production_info_string[16]",
        "production_info_string[17]",
        "production_info_string[18]",
        "production_info_string[19]"
    ];
    /**
     * Get the sensor that owns the production_info_strings.
     */
    public function Sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
