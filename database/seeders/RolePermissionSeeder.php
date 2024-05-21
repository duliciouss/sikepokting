<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Superadmin permissions
        $superadmin = Role::where('name', 'superadmin')->first();
        if ($superadmin) {
            $permissions = Permission::get();
            Log::info($superadmin);
            $superadmin->syncPermissions($permissions);
        }

        // Operator permissions
        $operatorPermissions = [
            'dashboard',
            'kelola komoditas',
            'kelola pengguna',
            'create harga',
            'view harga',
            'update harga',
            'delete harga',
            'export harga',
            'create persediaan',
            'view persediaan',
            'update persediaan',
            'delete persediaan',
            'export persediaan',
            'kelola unit kerja',
            'kelola satuan',
            'kelola pasar'
        ];
        $operator = Role::where('name', 'operator')->first();
        if ($operator) {
            $permissions = Permission::whereIn('name', $operatorPermissions)->get();
            Log::info($permissions);
            $operator->syncPermissions($permissions);
        }

        // Pasar permissions
        $pasarPermissions = [
            'dashboard',
            'create harga',
            'view harga',
            'update harga',
            'delete harga',
            'export harga',
            'create persediaan',
            'view persediaan',
            'update persediaan',
            'delete persediaan',
            'export persediaan',
        ];
        $pasar = Role::where('name', 'pasar')->first();
        if ($pasar) {
            $permissions = Permission::whereIn('name', $pasarPermissions)->get();

            $pasar->syncPermissions($permissions);
        }

        // Monitoring permissions
        $monitoringPermissions = [
            'dashboard',
            'view harga',
            'export harga',
            'view persediaan',
            'export persediaan',
        ];
        $monitoring = Role::where('name', 'monitoring')->first();
        if ($monitoring) {
            $permissions = Permission::whereIn('name', $monitoringPermissions)->get();
            $monitoring->syncPermissions($permissions);
        }
    }
}
