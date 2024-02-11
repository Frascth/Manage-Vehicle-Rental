<?php

namespace App\Exports;

use App\Models\VehiclePost;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VehiclePostExport implements WithHeadings, FromQuery
{
    protected $ids = [];

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function query() 
    {
        if (!is_array($this->ids) && in_array($this->ids, ['*', 'all'])) {
            return VehiclePost::query();
        }

        return VehiclePost::query()->whereIn('id', $this->ids);
    }

    public function headings(): array
    {
        // Get the first record from the collection to extract column names
        $vehiclePost = VehiclePost::first();

        // Return the column names as array
        return array_keys($vehiclePost->toArray());
    }


}
