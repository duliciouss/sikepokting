<?php

namespace Database\Seeders;

use App\Models\Unor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnorSeeder extends Seeder
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
                'code' => '406301000000',
                'name' => 'UPTD Pasar Ciasem'
            ],
            [
                'code' => '406302000000',
                'name' => 'UPTD Pasar Jalancagak'
            ],
            [
                'code' => '406303000000',
                'name' => 'UPTD Pasar Pagaden'
            ],
            [
                'code' => '406304000000',
                'name' => 'UPTD Pasar Pamanukan'
            ],
            [
                'code' => '406305000000',
                'name' => 'UPTD Pasar Purwadadi'
            ],
            [
                'code' => '406306000000',
                'name' => 'UPTD Pasar Subang'
            ],
        ];
        foreach ($data as $value) {
            Unor::create($value);
        }
    }
}
