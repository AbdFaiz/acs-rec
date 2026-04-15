<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Region;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jakarta = Region::where('regionid', 'JKT')->first();
        $bandung = Region::where('regionid', 'BDG')->first();
        $surabaya = Region::where('regionid', 'SBY')->first();

        $positions = [
            // Jakarta
            ['region_id' => $jakarta->id, 'name' => 'Staff IT - Programmer', 'description' => 'Mengembangkan dan memelihara aplikasi', 'has_psychotest' => true, 'order' => 1],
            ['region_id' => $jakarta->id, 'name' => 'Staff IT - Network Engineer', 'description' => 'Mengelola jaringan dan infrastruktur', 'has_psychotest' => true, 'order' => 2],
            ['region_id' => $jakarta->id, 'name' => 'HRD Staff - Recruitment', 'description' => 'Menangani proses rekrutmen', 'has_psychotest' => true, 'order' => 3],
            ['region_id' => $jakarta->id, 'name' => 'Marketing Staff', 'description' => 'Memasarkan produk perusahaan', 'has_psychotest' => false, 'order' => 4],
            
            // Bandung
            ['region_id' => $bandung->id, 'name' => 'Finance Staff', 'description' => 'Mengelola keuangan perusahaan', 'has_psychotest' => true, 'order' => 5],
            ['region_id' => $bandung->id, 'name' => 'Accounting Staff', 'description' => 'Mengelola pembukuan dan akuntansi', 'has_psychotest' => true, 'order' => 6],
            ['region_id' => $bandung->id, 'name' => 'Customer Service', 'description' => 'Melayani pelanggan', 'has_psychotest' => false, 'order' => 7],
            
            // Surabaya
            ['region_id' => $surabaya->id, 'name' => 'Administrasi', 'description' => 'Menangani administrasi umum', 'has_psychotest' => false, 'order' => 8],
            ['region_id' => $surabaya->id, 'name' => 'Operasional', 'description' => 'Menangani operasional perusahaan', 'has_psychotest' => false, 'order' => 9],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
