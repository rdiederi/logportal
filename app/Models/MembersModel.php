<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Log;

class MembersModel extends Model
{
    use HasFactory;

    protected $fillable = [
        "Email",
        "Klaviyo ID",
        "First Name",
        "Last Name",
        "Organization",
        "Title",
        "Phone Number",
        "Address",
        "Address 2",
        "City",
        "State / Region",
        "Country",
        "Zip Code",
        "Latitude",
        "Longitude",
        "Source",
        "Consent",
        "SMS Consent Timestamp",
        "First Active",
        "Last Active",
        "Profile Created On",
        "Date Added",
        "Last Open",
        "Last Click",
        "Initial Source",
        "Initial Source Referrer",
        "Initial Source Term",
        "Initial Source Medium",
        "Initial Source First Page",
        "Initial Source Campaign",
        "Initial Source Content",
        "Last Source",
        "Last Source Referrer",
        "Last Source Term",
        "Last Source Medium",
        "Last Source First Page",
        "Last Source Campaign",
        "Last Source Content",
        "Historic Customer Lifetime Value",
        "Predicted Customer Lifetime Value",
        "Total Customer Lifetime Value",
        "Historic Number Of Orders",
        "Predicted Number Of Orders",
        "Churn Risk Prediction",
        "Average Days Between Orders",
        "Average Order Value",
        "Expected Date Of Next Order",
        "MyUnknownColumn",
        "\$consent_form_id",
        "\$consent_form_version",
        "\$consent_method",
        "\$consent_timestamp",
        "\$phone_number_region",
        "\$sms_consent_method",
        "\$timezone",
        "Accepts Marketing",
        "consent_form_id",
        "consent_form_version",
        "consent_method",
        "Contract End",
        "Contract Start",
        "Initial Referring Domain",
        "Last Referring Domain",
        "Last Search Engine",
        "Last Search Keyword",
        "pgashowsurvey",
        "pgashowsurveycustomers",
        "Position",
        "School",
        "Search Engine",
        "Search Keyword",
        "Serial Number",
        "Shopify Tags",
        "UTM Campaign",
        "UTM Content",
        "UTM Medium",
        "UTM Source",
        "UTM Term",
        'member_updated',
        'member_created'
    ];

    public static $firstLabels = [
        'Email',
        'First Name',
        'Last Name',
        'Phone Number',
        'Country',
        'Profile Created On',
    ];

    protected $table = "members";

    protected $primaryKey = "id";

    public $incrementing = true;

    public static function getFirstMembers(){
        $members = DB::select('select * from members limit 100');

        return $members;
    }

    public static function getTableHeaders(){
        $members = DB::select("select column_name from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='members'");

        foreach ($members as $key => $value) {
            if (in_array($value->{'COLUMN_NAME'}, self::$firstLabels)) {
                $headers[] = $value->{'COLUMN_NAME'};
            }
        }

        return $headers;
    }

    public static function getAllTableHeaders(){
        $headers = DB::select("select column_name from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='members'");

        $headers_array = [];
        foreach ($headers as $key => $value) {
            $headers_array[] = $value->{'COLUMN_NAME'};
        }

        return $headers_array;
    }

    public static function getSearchData($field, $term){
        if ($field && $term) {
            $members = MembersModel::where($field, 'like', '%' . $term . '%')->limit(100)->get();
        } else {
            $members = MembersModel::all()->limit(100);
        }

        return $members;
    }


    public static function getFilteredData($filterBy){
        if ($filterBy) {
            // $members = MembersModel::orderBy($filterBy, 'asc')->get();
            // $members = DB::select('SELECT * FROM members ORDER BY '..' DESC');
            Log::debug("members start");

            $members = [];
            MembersModel::orderBy($filterBy, 'asc')->chunkById(50, function ($chunked_results) use (&$members) {
                $members = $chunked_results;
            });

            Log::debug(json_encode($members));

        } else {
            $members = MembersModel::all()->limit(100);
        }

        return $members;
    }
}
