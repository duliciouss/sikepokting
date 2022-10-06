<?php

namespace Database\Seeders;

use App\Models\Commodity;
use App\Models\Uom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailCommoditySeeder extends Seeder
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
                'name' => 'Permium',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'BERAS')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'BERAS')->first()->order_report
            ],
            [
                'name' => 'Medium',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'BERAS')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'BERAS')->first()->order_report
            ],
            [
                'name' => 'Gula Pasir Dalam Negeri',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'GULA PASIR DALAM NEGERI')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'GULA PASIR DALAM NEGERI')->first()->order_report
            ],
            [
                'name' => 'Kemasan Premium',
                'uom_id' => Uom::where('name', 'liter/ml')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'MINYAK GORENG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'MINYAK GORENG')->first()->order_report
            ],
            [
                'name' => 'Minyak Goreng Curah',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'MINYAK GORENG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'MINYAK GORENG')->first()->order_report
            ],
            [
                'name' => 'Minyak Goreng Kemasan Sederhana',
                'uom_id' => Uom::where('name', 'liter')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'MINYAK GORENG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'MINYAK GORENG')->first()->order_report
            ],
            [
                'name' => 'Cap Segitiga Biru',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'TEPUNG TERIGU')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'TEPUNG TERIGU')->first()->order_report
            ],
            [
                'name' => 'Daging Sapi',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'DAGING SAPI')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'DAGING SAPI')->first()->order_report
            ],
            [
                'name' => 'Paha Belakang',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'DAGING SAPI')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'DAGING SAPI')->first()->order_report
            ],
            [
                'name' => 'Paha Depan',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'DAGING SAPI')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'DAGING SAPI')->first()->order_report
            ],
            [
                'name' => 'Daging Ayam Broiler',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'DAGING AYAM')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'DAGING AYAM')->first()->order_report
            ],
            [
                'name' => 'Daging Ayam Kampung',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'DAGING AYAM')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'DAGING AYAM')->first()->order_report
            ],
            [
                'name' => 'Telur Ayam Broiler',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'TELUR')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'TELUR')->first()->order_report
            ],
            [
                'name' => 'Telur Ayam Kampung',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'TELUR')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'TELUR')->first()->order_report
            ],
            [
                'name' => 'Cabe Merah Keriting',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'CABE')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'CABE')->first()->order_report
            ],
            [
                'name' => 'Cabe Merah Besar',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'CABE')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'CABE')->first()->order_report
            ],
            [
                'name' => 'Cabe Rawit Hijau',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'CABE RAWIT')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'CABE RAWIT')->first()->order_report
            ],
            [
                'name' => 'Cabe Rawit Merah',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'CABE RAWIT')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'CABE RAWIT')->first()->order_report
            ],
            [
                'name' => 'Bawang Merah',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'BAWANG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'BAWANG')->first()->order_report
            ],
            [
                'name' => 'Bawang Putih Super',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'BAWANG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'BAWANG')->first()->order_report
            ],
            [
                'name' => 'Wortel',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'WORTEL')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'WORTEL')->first()->order_report
            ],
            [
                'name' => 'Kol',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'KOL')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'KOL')->first()->order_report
            ],
            [
                'name' => 'Buncis',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'BUNCIS')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'BUNCIS')->first()->order_report
            ],
            [
                'name' => 'Tomat',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'TOMAT')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'TOMAT')->first()->order_report
            ],
            [
                'name' => 'Kentang',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'KENTANG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'KENTANG')->first()->order_report
            ],
            [
                'name' => 'Susu Kental Manis',
                'uom_id' => Uom::where('name', '397 gr/kl')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'SUSU')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'SUSU')->first()->order_report
            ],
            [
                'name' => 'Susu Bubuk',
                'uom_id' => Uom::where('name', '400 gr')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'SUSU')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'SUSU')->first()->order_report
            ],
            [
                'name' => 'Garam Beryodium Bata',
                'uom_id' => Uom::where('name', '1 bata')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'GARAM')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'GARAM')->first()->order_report
            ],
            [
                'name' => 'Garam Beryodium Halus',
                'uom_id' => Uom::where('name', 'bungkus')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'GARAM')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'GARAM')->first()->order_report
            ],
            [
                'name' => 'Kacang Kedelai',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'KACANG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'KACANG')->first()->order_report
            ],
            [
                'name' => 'Kacang Tanah',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'KACANG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'KACANG')->first()->order_report
            ],
            [
                'name' => 'Kacang Hijau',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'KACANG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'KACANG')->first()->order_report
            ],
            [
                'name' => 'Indomie Kari Ayam',
                'uom_id' => Uom::where('name', 'bungkus')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'INDOMIE KARI AYAM')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'INDOMIE KARI AYAM')->first()->order_report
            ],
            [
                'name' => 'Ikan Asin Teri No. 2',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'IKAN ASIN')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'IKAN ASIN')->first()->order_report
            ],
            [
                'name' => 'Ikan Kembung',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'IKAN KEMBUNG')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'IKAN KEMBUNG')->first()->order_report
            ],
            [
                'name' => 'Ketela Pohon',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'KETELA POHON')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'KETELA POHON')->first()->order_report
            ],
            [
                'name' => 'Ubi Jalar',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'UBI JALAR')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'UBI JALAR')->first()->order_report
            ],
            [
                'name' => 'Ikan Mas',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'IKAN SEGAR')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'IKAN SEGAR')->first()->order_report
            ],
            [
                'name' => 'Ikan Nila',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'IKAN SEGAR')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'IKAN SEGAR')->first()->order_report
            ],
            [
                'name' => 'Jagung Pipilan Kering',
                'uom_id' => Uom::where('name', 'kg')->first()->id,
                'type' => 'DETAIL',
                'parent_id' => Commodity::where('name', 'JAGUNG PIPILAN KERING')->first()->id,
                'image_name' => '',
                'image_path' => '',
                'order_report' => Commodity::where('name', 'JAGUNG PIPILAN KERING')->first()->order_report
            ],
        ];

        foreach ($data as $value) {
            Commodity::create($value);
        }
    }
}
