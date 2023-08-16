@extends('layouts.app',[
'title' => 'Laporan Data Bahan Baku',
'pageTitle' => 'Laporan Data Bahan Baku'
])
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tabel Bahan Baku</h1>
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
                    <h3 class="card-title">Data Bahan Baku</h3>
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
                                            <th style="width: 90px">Id Bahan Baku</th>
                                            <th style="width: 90px">Nama Bahan Baku</th>
                                            <th style="width: 200px">Jenis Bahan Baku</th>
                                        </tr>
                                    </thead>
                                    @foreach ($baku as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $data->id_bahanbaku }}</td>
                                            <td>{{ $data->nama_bahanbaku }}</td>
                                            <td>{{ $data->jenis_bahanbaku}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a class="btn btn-md btn-success mb-3 float-right" href="{{ route('laporan/bahan/baku/pdf') }}"><i class="fa fa-print"></i> Cetak PDF</a>
                                <div class="row">
                                    {!! $baku->links() !!}
                                </div>
                                @endsection