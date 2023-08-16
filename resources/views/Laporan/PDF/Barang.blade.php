<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
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
            background: transparent;
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
                    <h1 class="text-center">LAPORAN BARANG</h1>
                </h1>
            </div>
            <table class=" table table-bordered" style="table-layout: fixed">
                <tr class="font-12">
                    <th style="width: 25px">ID Barang</th>
                    <th style="width: 25px">Jenis Barang</th>
                    <th style="width: 25px">Nama Barang</th>
                    <th style="width: 25px">Stok Barang</th>
                    <th style="width: 25px">Harga Jual</th>
                    <th style="width: 25px">Total</th>
                </tr>
                @foreach ($barang as $data)
                <tr>
                    <td style="width: 25px">{{ $data->id_barang }}</td>
                    <td style=" width: 25px">{{ $data->jenis_barang }}</td>
                    <td style="width: 25px">{{ $data->nama_barang }}</td>
                    <td style="width: 25px">{{ $data->stok_barang }}</td>
                    <td style="width: 25px">{{ $data->harga }}</td>
                    <td style="width: 25px">{{ $data->total }}</td>
                </tr>
                @endforeach
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