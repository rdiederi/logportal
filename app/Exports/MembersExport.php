<?php

namespace App\Exports;

use App\Models\MembersModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Log;

class MembersExport implements FromCollection, WithHeadings
{
        /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        Log::debug("collection");
        ## 1. Export all data
        return MembersModel::all();

        ## 2. Export specific columns
        // return MembersModel::select('id','username','name')->get();

    }

    public function headings(): array
    {
        return MembersModel::getAllTableHeaders();
    }
}
