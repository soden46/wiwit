@extends('layouts.app',[
'title' => 'Form Beban Pengiriman',
'pageTitle' => 'Form Beban Pengiriman',
])
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Data Pengiriman</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Masukan Data Pengiriman</h3>
                    </div>
                    <form action="{{route('beban/pengiriman/edit/post',$data->id_penjualan)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="id_customer">ID Customer</label>
                                <input type="text" class="form-control" id="id_customer" name="id_customer" required value="{{$data->id_customer}}" readonly>
                            </div>
                            <div class="form-floating">
                                <label for="id_penjualan">ID Penjualan</label>
                                <input type="text" class="form-control" id="id_penjualan" name="id_penjualan" required value="{{$data->id_penjualan}}" readonly>
                            </div>
                            <div class="form-floating">
                                <label for="id_barang">ID Barang</label>
                                <input type="text" class="form-control" id="id_barang" name="id_barang" required value="{{$data->id_barang}}" readonly>
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Total Pembelian</label>
                                <input type="text" name="total_pembelian" class="form-control @error('total_pembelian')is-invalid @enderror" id="total_pembelian" required value="{{$data->total_pembelian}}" onchange="reSum();">
                                @error('total_pembelian')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Biaya Pengiriman</label>
                                <input type="number" name="biaya_pengiriman" class="form-control @error('biaya_pengiriman')is-invalid @enderror" id="biaya_pengiriman" placeholder="Masukan Biaya Pengiriman" required value="{{$data->biaya_pengiriman}}" onchange="reSum();">
                                @error('biaya_pengiriman')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Sub Total pengiriman</label>
                                <input type="number" name="sub_total_pengiriman" class="form-control @error('sub_total_pengiriman')is-invalid @enderror" id="sub_total_pengiriman" placeholder="Masukan Biaya Pengiriman" required value="{{$data->sub_total_pengiriman}}" onchange="reSum();">
                                @error('sub_total_pengiriman')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-12" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery-3.2.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        function reSum() {
            var num1 = parseInt(document.getElementById("total_pembelian").value);
            var num2 = parseInt(document.getElementById("biaya_pengiriman").value);
            document.getElementById("sub_total_pengiriman").value = num1 + num2;
        }
    </script>
    @endsection