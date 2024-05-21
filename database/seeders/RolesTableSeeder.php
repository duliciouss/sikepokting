<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'superadmin',
            'operator',
            'pasar',
            'monitoring',
        ];

        foreach ($roles as $role) {
            Role::create([
                'id' => (string) Str::uuid(),
                'name' => $role,
                'guard_name' => 'web',
            ]);
        }
    }
}
