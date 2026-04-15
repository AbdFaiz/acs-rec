<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['regionid' => 'JKT', 'name' => 'Jakarta', 'slug' => 'jakarta'],
            ['regionid' => 'BDG', 'name' => 'Bandung', 'slug' => 'bandung'],
            ['regionid' => 'SBY', 'name' => 'Surabaya', 'slug' => 'surabaya'],
            ['regionid' => 'SMG', 'name' => 'Semarang', 'slug' => 'semarang'],
            ['regionid' => 'MDN', 'name' => 'Medan', 'slug' => 'medan'],
            ['regionid' => 'MKS', 'name' => 'Makassar', 'slug' => 'makassar'],
            ['regionid' => 'BAL', 'name' => 'Bali', 'slug' => 'bali'],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
