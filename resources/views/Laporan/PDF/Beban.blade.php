<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-size: 12px;
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
        }

        .table,
        .td,
        .th,
        thead {
            border: 1px solid black;
            text-align: center
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .text-center {
            text-align: center;
        }

        .text-success {
            color: green
        }

        .text-danger {
            color: red
        }

        .fw-bold {
            font-weight: bold
        }

        .tandatangan {

            text-align: center;
            margin-left: 400px;

        }

        .header img {
            float: left;
            width: 100px;
            height: 100px;
            background: #C0C0C0;
        }

        .header h1 {
            font-size: 18px;
            font-family: Verdana, Tahoma, "DejaVu Sans", sans-serif;
            position: relative;
            top: 5px;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="header mb-3">
                <img src="{{ public_path('storage/logo/logopdf.png')}}" alt="" width="42px" height="42px" />
                <h1 class="text-center">INDUSTRI BARANG PLASTIK<br>
                    <P class="text-center">Dukuh Buduran, Kelurahan Kalikobok, Kec.Tanon
                        Kab Sragen, Provinsi Jawa Tengah</P>
                    <h1 class="text-center">LAPORAN BEBAN PENGIRIMAN</h1>
                </h1>
            </div>
            <table class=" table table-bordered" style="table-layout: fixed">
                <tr class="font-12">
                    <th>Nama Admin</th>
                    <th>Nama Customer</th>
                    <th>ID Barang</th>
                    <th>Jenis Barang</th>
                    <th>Banyak Beli</th>
                    <th>Harga</th>
                    <th>Biaya Pengiriman</th>
                    <th>Sub Total Pengiriman</th>
                </tr>
                </thead>
                @foreach ($Pengiriman as $data)
                <tbody>
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nama_customer}}</td>
                        <td>{{ $data->id_barang}}</td>
                        <td>{{ $data->jenis_barang}}</td>
                        <td>{{ $data->banyak_beli }}</td>
                        <td>{{ $data->harga }}</td>
                        <td>{{ $data->biaya_pengiriman }}</td>
                        <td>{{ $data->sub_total_pengiriman }}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <div class="tandatangan">

                <br>

                <p style="padding-bottom:25px">
                    Sragen, {!!$tgl!!}</p>



                <p>{{Auth::user()->role}}</p>
                <p>{{Auth::user()->nama}}</p>
            </div>
        </div>
    </div>
</body>

</html>