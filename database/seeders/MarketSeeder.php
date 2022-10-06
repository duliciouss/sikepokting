<?php

namespace Database\Seeders;

use App\Models\Market;
use App\Models\Unor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarketSeeder extends Seeder
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
                'unor_id' => Unor::where('name', 'UPTD Pasar Ciasem')->first()->id,
                'name' => 'Pasar Ciasem',
                'address' => '',
                'is_active' => 1
            ],
            [
                'unor_id' => Unor::where('name', 'UPTD Pasar Jalancagak')->first()->id,
                'name' => 'Pasar Jalancagak',
                'address' => '',
                'is_active' => 1
            ],
            [
                'unor_id' => Unor::where('name', 'UPTD Pasar Pagaden')->first()->id,
                'name' => 'Pasar Pagaden',
                'address' => '',
                'is_active' => 1
            ],
            [
                'unor_id' => Unor::where('name', 'UPTD Pasar Pamanukan')->first()->id,
                'name' => 'Pasar Pamanukan',
                'address' => '',
                'is_active' => 1
            ],
            [
                'unor_id' => Unor::where('name', 'UPTD Pasar Purwadadi')->first()->id,
                'name' => 'Pasar Purwadadi',
                'address' => '',
                'is_active' => 1
            ],
            [
                'unor_id' => Unor::where('name', 'UPTD Pasar Subang')->first()->id,
                'name' => 'Pasar Subang',
                'address' => '',
                'is_active' => 1
            ],
        ];
        foreach ($data as $value) {
            Market::create($value);
        }
    }
}
