@extends('layouts.app',[
'title' => 'Laporan Pembelian',
'pageTitle' => 'Laporan Pembelian'
])
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tabel Pembelian</h1>
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
                    <h3 class="card-title">Laporan Pembelian</h3>
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
                                            <th style="width: 90px">Id Pembelian</th>
                                            <th style="width: 90px">Nama Supllier</th>
                                            <th style="width: 90px">Nama Admin</th>
                                            <th style="width: 90px">Tanggal Beli</th>
                                            <th style="width: 200px">Banyak Beli</th>
                                            <th style="width: 200px">Harga</th>
                                            <th style="width: 200px">Total Pembelian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembelian as $beli)
                                        <tr>
                                            <td style="width: 25px">{{ $beli->id_pembelian }}</td>
                                            <td style="width: 25px">{{ $beli->nama_supplier }}</td>
                                            <td style="width: 25px">{{ $beli->nama }}</td>
                                            <td style="width: 25px">{{ $beli->tanggal_beli }}</td>
                                            <td style="width: 25px">{{ $beli->banyak_beli }}</td>
                                            <td style="width: 25px">{{ $beli->harga }}</td>
                                            <td style="width: 25px">{{ $beli->total_pembelian }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a class="btn btn-md btn-success mb-3 float-right" href="{{ route('laporan/pembelian/bahan/baku/pdf') }}"><i class="fa fa-print"></i> Cetak PDF</a>
                                <div class="row text-center">
                                    {!! $pembelian->links() !!}
                                </div>
                                @endsection