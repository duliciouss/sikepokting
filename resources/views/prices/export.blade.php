<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Unduh Laporan</title>
</head>

<body>
    <table class="table table-bordered my-2">
        <thead class="text-center">
            <tr>
                <th colspan="8" style="text-align: center">
                    <strong> DAFTAR ISIAN HARGA RATA-RATA BEBERAPA BAHAN POKOK </strong>
                </th>
            </tr>
            <tr>
                <th colspan="8" style="text-align: center">
                    <strong> DINAS KOPERASI, UMKM, PERDAGANGAN DAN PERINDUSTRIAN </strong>
                </th>
            </tr>
            <tr>
                <th colspan="8" style="text-align: center">
                    <strong> KABUPATEN SUBANG </strong>
                </th>
            </tr>
            <tr>
                <th></th>
            </tr>
            <tr>
                <th class="align-middle" rowspan="2"><strong> No </strong></th>
                <th class="align-middle" rowspan="2"><strong> Nama Komoditas </strong></th>
                <th class="align-middle" rowspan="2"><strong> Satuan </strong></th>
                <th colspan="2"><strong> Harga (Rp.) </strong></th>
                <th colspan="2"><strong> Perubahan </strong></th>
                <th class="align-middle" rowspan="2"><strong> Keterangan </strong></th>
            </tr>
            <tr>
                <td><strong> Kemarin </strong></td>
                <td><strong> Hari Ini </strong></td>
                <td><strong> Rp </strong></td>
                <td><strong> % </strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($prices as $price)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $price->commodity->name }}</td>
                    <td>{{ $price->commodity->uom->name }}</td>
                    <td>0</td>
                    <td>{{ $price->price }}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
