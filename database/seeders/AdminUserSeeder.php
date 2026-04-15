<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jakarta = Region::where('regionid', 'JKT')->first();
        $bandung = Region::where('regionid', 'BDG')->first();
        $surabaya = Region::where('regionid', 'SBY')->first();

        // Super Admin (bisa lihat semua region)
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@recruitment.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'region_id' => null, 
        ]);
        $superAdmin->assignRole('superadmin');

        // HRD Jakarta (hanya lihat candidate di region Jakarta)
        $hrdJakarta = User::create([
            'name' => 'HRD Jakarta',
            'email' => 'hrd.jakarta@recruitment.com',
            'password' => Hash::make('password'),
            'phone' => '081234567891',
            'is_active' => true,
            'region_id' => $jakarta->id,
        ]);
        $hrdJakarta->assignRole('hrd');

        // HRD Bandung (hanya lihat candidate di region Bandung)
        $hrdBandung = User::create([
            'name' => 'HRD Bandung',
            'email' => 'hrd.bandung@recruitment.com',
            'password' => Hash::make('password'),
            'phone' => '081234567892',
            'is_active' => true,
            'region_id' => $bandung->id,
        ]);
        $hrdBandung->assignRole('hrd');

        // HCM Surabaya (hanya lihat candidate di region Surabaya)
        $hcmSurabaya = User::create([
            'name' => 'HCM Surabaya',
            'email' => 'hcm.surabaya@recruitment.com',
            'password' => Hash::make('password'),
            'phone' => '081234567893',
            'is_active' => true,
            'region_id' => $surabaya->id,
        ]);
        $hcmSurabaya->assignRole('hcm');

        // Sample candidate Jakarta
        $candidateJakarta = User::create([
            'name' => 'John Doe',
            'email' => 'candidate.jakarta@example.com',
            'password' => Hash::make('password'),
            'phone' => '081234567894',
            'is_active' => true,
            'region_id' => $jakarta->id,
        ]);
        $candidateJakarta->assignRole('candidate');
        
        // Sample candidate Bandung
        $candidateBandung = User::create([
            'name' => 'Jane Smith',
            'email' => 'candidate.bandung@example.com',
            'password' => Hash::make('password'),
            'phone' => '081234567895',
            'is_active' => true,
            'region_id' => $bandung->id,
        ]);
        $candidateBandung->assignRole('candidate');
    }
}
