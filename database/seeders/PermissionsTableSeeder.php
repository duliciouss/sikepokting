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
            'kelola harga',
            'kelola unit kerja',
            'kelola persediaan',
            'kelola satuan',
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
