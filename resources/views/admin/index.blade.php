@extends('layouts.app' , ['page' => 'index'])

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col-auto">
                    <span class="border">
                        Industri Barang Plastik adalah industri yang melakukan proses daur ulang dari
                        limbah pastik menjadi biji plastik yang nantinya akan didistribusikan ke beberapa
                        pabrik plastik dan rafia di kabupaten Sragen. Biji plastik berupa butiran berwarna
                        bening dan berbahan dasar bahan kimia yang bernama styrin monomer. Biji plastik
                        yang asli terbuat dari styrin monomer Ada juga yang terbuat dari biji plastik daur
                        ulang. Industri Barang Plastik ini berlokasi di Dukuh Buduran, Kelurahan
                        Kalikobok, Kec.Tanon, Kab Sragen, Provinsi Jawa Tengah. Industri Barang Plastik
                        yang telah berdiri selama 5 tahun sejak 2018. Pada awal pendirian usaha ini, hanya
                        terdapat tiga orang pekerja termasuk pemilik, tetapi sekarang sudah berkembang
                        menjadi 25orang
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection