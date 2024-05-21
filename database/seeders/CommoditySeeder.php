<?php

namespace Database\Seeders;

use App\Models\Commodity;
use App\Models\Uom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommoditySeeder extends Seeder
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
                'name' => 'Beras Permium',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 1
            ],
            [
                'name' => 'Beras Medium',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 2
            ],
            [
                'name' => 'Gula Pasir Dalam Negeri',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 3
            ],
            [
                'name' => 'Minyak Goreng Kemasan Premium',
                'uom_id' => Uom::where('name', 'liter/ml')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 4
            ],
            [
                'name' => 'Minyak Goreng Curah',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 5
            ],
            [
                'name' => 'Minyak Goreng Kemasan Sederhana',
                'uom_id' => Uom::where('name', 'liter')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 6
            ],
            [
                'name' => 'Tepung Cap Segitiga Biru',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 7
            ],
            [
                'name' => 'Daging Sapi',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 8
            ],
            [
                'name' => 'Daging Sapi: Paha Belakang',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 9
            ],
            [
                'name' => 'Daging Sapi: Paha Depan',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 10
            ],
            [
                'name' => 'Daging Ayam Broiler',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 11
            ],
            [
                'name' => 'Daging Ayam Kampung',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 12
            ],
            [
                'name' => 'Telur Ayam Broiler',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 13
            ],
            [
                'name' => 'Telur Ayam Kampung',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 14
            ],
            [
                'name' => 'Cabe Merah Keriting',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 15
            ],
            [
                'name' => 'Cabe Merah Besar',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 16
            ],
            [
                'name' => 'Cabe Rawit Hijau',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 17
            ],
            [
                'name' => 'Cabe Rawit Merah',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 18
            ],
            [
                'name' => 'Bawang Merah',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 19
            ],
            [
                'name' => 'Bawang Putih Super',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 20
            ],
            [
                'name' => 'Wortel',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 21
            ],
            [
                'name' => 'Kol',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 22
            ],
            [
                'name' => 'Buncis',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 23
            ],
            [
                'name' => 'Tomat',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 24
            ],
            [
                'name' => 'Kentang',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 25
            ],
            [
                'name' => 'Susu Kental Manis',
                'uom_id' => Uom::where('name', '397 gr/kl')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 26
            ],
            [
                'name' => 'Susu Bubuk',
                'uom_id' => Uom::where('name', '400 gr')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 27
            ],
            [
                'name' => 'Garam Beryodium Bata',
                'uom_id' => Uom::where('name', '1 bata')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 28
            ],
            [
                'name' => 'Garam Beryodium Halus',
                'uom_id' => Uom::where('name', 'bungkus')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 29
            ],
            [
                'name' => 'Kacang Kedelai',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 30
            ],
            [
                'name' => 'Kacang Tanah',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 31
            ],
            [
                'name' => 'Kacang Hijau',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 32
            ],
            [
                'name' => 'Indomie Kari Ayam',
                'uom_id' => Uom::where('name', 'bungkus')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 33
            ],
            [
                'name' => 'Ikan Asin Teri No. 2',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 34
            ],
            [
                'name' => 'Ikan Kembung',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 35
            ],
            [
                'name' => 'Ketela Pohon',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 36
            ],
            [
                'name' => 'Ubi Jalar',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 37
            ],
            [
                'name' => 'Ikan Mas',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 38
            ],
            [
                'name' => 'Ikan Nila',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 39
            ],
            [
                'name' => 'Jagung Pipilan Kering',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => 40
            ],
        ];

        foreach ($data as $value) {
            Commodity::create($value);
        }
    }
}
