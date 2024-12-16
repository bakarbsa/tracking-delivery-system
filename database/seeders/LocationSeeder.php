<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
  public function run()
  {
    $locations = [
      [
        'id' => 1,
        'type' => 'warehouse',
        'name' => 'Warehouse Surabaya',
      ],
      [
        'id' => 2,
        'type' => 'warehouse',
        'name' => 'Warehouse Malang',
      ],
      [
        'id' => 3,
        'type' => 'store',
        'name' => 'Store Surabaya',
      ],
    ];

    Location::insert($locations);
  }
}