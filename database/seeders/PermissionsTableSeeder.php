<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
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

        foreach ($permissions as $permission) {
            Permission::create([
                'id' => (string) Str::uuid(),
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
