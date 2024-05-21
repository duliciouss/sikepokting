<?php

namespace Database\Seeders;

use App\Models\Market;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Super Admin',
                'username' => 'suadmin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('terbaik123'),
                'role' => 'superadmin',
                'market_id' => null
            ],
            [
                'name' => 'Operator User',
                'username' => 'operator',
                'email' => 'operator@example.com',
                'password' => Hash::make('operator'),
                'role' => 'operator',
                'market_id' => null
            ],
            [
                'name' => 'Pasar Subang',
                'username' => 'pasar_subang',
                'email' => 'pasar@example.com',
                'password' => Hash::make('pasar_subang'),
                'role' => 'pasar',
                'market_id' => Market::where('name', 'Pasar Subang')->first()->id
            ],
            [
                'name' => 'Monitoring User',
                'username' => 'monitoring',
                'email' => 'monitoring@example.com',
                'password' => Hash::make('monitoring'),
                'role' => 'monitoring',
                'market_id' => null
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'id' => (string) Str::uuid(),
                'name' => $userData['name'],
                'username' => $userData['username'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'market_id' => $userData['market_id']
            ]);

            $user->assignRole($userData['role']);
        }
    }
}
