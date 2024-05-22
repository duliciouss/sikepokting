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
                'email' => 'superadmin@sikepokting.subang.go.id',
                'password' => Hash::make('terbaik123'),
                'role' => 'superadmin',
                'market_id' => null
            ],
            [
                'name' => 'Operator User',
                'username' => 'operator',
                'email' => 'operator@sikepokting.subang.go.id',
                'password' => Hash::make('operator'),
                'role' => 'operator',
                'market_id' => null
            ],
            [
                'name' => 'Monitoring User',
                'username' => 'monitoring',
                'email' => 'monitoring@sikepokting.subang.go.id',
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

        $markets = Market::all();
        foreach ($markets as $market) {
            $username = strtolower(str_replace(" ", "-", $market->name));
            $user = User::create([
                'id' => (string) Str::uuid(),
                'name' => $market->name,
                'username' => $username,
                'email' => $username . '@sikepokting.subang.go.id',
                'password' => Hash::make($username),
                'market_id' => $market->id
            ]);

            $user->assignRole('pasar');
        }
    }
}
