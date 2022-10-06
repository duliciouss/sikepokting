<?php

namespace Database\Seeders;

use App\Models\Uom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'kg',
            ],
            [
                'name' => 'bungkus',
            ],
            [
                'name' => 'liter',
            ],
            [
                'name' => '400 gr',
            ],
            [
                'name' => '397 gr/kl',
            ],
            [
                'name' => '1 bata',
            ],
            [
                'name' => 'liter/ml',
            ],
        ];
        foreach ($data as $value) {
            Uom::create($value);
        }
    }
}
