<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // Candidate permissions
            'view own profile',
            'edit own profile',
            'submit application',
            'take psychotest',
            
            // HRD/HCM permissions
            'view candidates',
            'view candidate detail',
            'update candidate status',
            'review application',
            'schedule interview',
            'export candidate data',
            
            // Admin permissions
            'manage users',
            'manage roles',
            'manage positions',
            'manage questions',
            'manage psychotests',
            'view all candidates',
            'delete candidates',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $superAdmin = Role::create(['name' => 'superadmin']);
        $hrd = Role::create(['name' => 'hrd']);
        $hcm = Role::create(['name' => 'hcm']);
        $candidate = Role::create(['name' => 'candidate']);

        // Assign permissions to superadmin (all permissions)
        $superAdmin->givePermissionTo(Permission::all());

        // Assign permissions to HRD
        $hrd->givePermissionTo([
            'view candidates',
            'view candidate detail',
            'update candidate status',
            'review application',
            'schedule interview',
            'export candidate data',
        ]);

        // Assign permissions to HCM (same as HRD for now)
        $hcm->givePermissionTo([
            'view candidates',
            'view candidate detail',
            'update candidate status',
            'review application',
            'schedule interview',
            'export candidate data',
        ]);

        // Assign permissions to Candidate
        $candidate->givePermissionTo([
            'view own profile',
            'edit own profile',
            'submit application',
            'take psychotest',
        ]);
    }
}
