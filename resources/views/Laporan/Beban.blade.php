@extends('layouts.app',[
'title' => 'Laporan Data Beban Pengiriman',
'pageTitle' => 'Laporan Data Beban Pengiriman'
])
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tabel Beban Pengiriman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content d-flex justify-content-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Beban Pengiriman</h3>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 90px">Id Customer</th>
                                            <th style="width: 90px">Nama Admin</th>
                                            <th style="width: 200px">Nama Customer</th>
                                            <th style="width: 200px">ID Barang</th>
                                            <th style="width: 200px">Jenis Barang</th>
                                            <th style="width: 200px">Banyak Beli</th>
                                            <th style="width: 200px">Harga</th>
                                            <th style="width: 200px">Biaya Pengiriman</th>
                                            <th style="width: 200px">Sub Total Pengiriman</th>
                                        </tr>
                                    </thead>
                                    @foreach ($pengiriman as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $data->id_customer }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->nama_customer}}</td>
                                            <td>{{ $data->id_barang}}</td>
                                            <td>{{ $data->jenis_barang}}</td>
                                            <td>{{ $data->banyak_beli }}</td>
                                            <td>{{ $data->harga }}</td>
                                            <td>{{ $data->biaya_pengiriman }}</td>
                                            <td>{{ $data->sub_total_pengiriman }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a class="btn btn-md btn-success mb-3 float-right" href="{{ route('laporan/beban/pengiriman/pdf') }}"><i class="fa fa-print"></i> Cetak PDF</a>
                                <div class="row text-center">
                                    {!! $pengiriman->links() !!}
                                </div>
                                @endsection