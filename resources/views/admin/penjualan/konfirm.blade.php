@extends('layouts.app',[
'title' => 'Form Data Penjualan Barang',
'pageTitle' => 'Form Data Penjualan Barang'
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
                <h1>Form Data Penjualan Barang</h1>
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
                        <h3 class="card-title">Masukan Data Penjualan Barang</h3>
                    </div>
                    <form id="quickForm" action="{{route('konfirmasi/pengiriman/post',$data->id_penjualan)}}" method="POST">
                        @csrf
                        <input type="text" name="id_penjualan" id="id_penjualan" value="{{$data->id_penjualan}}" hidden>
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="floatingInput">ID Barang</label>
                                <input type="text" name="id_barang" class="form-control @error('id_barang')is-invalid @enderror" id="floatingInput" placeholder="ID Barang" required value="{{$data->id_barang}}" readonly>
                                @error('id_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="id_customer">ID Customer</label>
                                <input type="text" class="form-control" id="floatingInput" placeholder="ID Customer" id="id_customer" name="id_customer" value="{!!$customer!!}" readonly>
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Tanggal Beli</label>
                                <input class="form-control @error('tanggal_beli')is-invalid @enderror" type="date" id="tanggal_beli" name="tanggal_beli" placeholder="Tanggal beli" value="{{$data->tanggal_beli}}">
                                @error('tanggal_beli')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="jenis_barang">Jenis Barang</label>
                                <select id="jenis_barang" name="jenis_barang" class="form-control">
                                    <option value="">Jenis Barang</option>
                                    <option value="{!! $jnis !!}" selected>{!! $jnis !!}</option>
                                    <option value="PE">PE</option>
                                </select>
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Total Pembelian</label>
                                <input class="form-control @error('total_pembelian')is-invalid @enderror" type="number" id="total_pembelian" name="total_pembelian" placeholder="Masukan Total Pembelian" required value="{{$data->total_pembelian}}" onchange="reSum();">
                                @error('total_pembelian')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <label for="floatingInput">Biaya Pengiriman</label>
                                <input class="form-control @error('biaya_pengiriman')is-invalid @enderror" type="number" id="biaya_pengiriman" name="biaya_pengiriman" placeholder="Masukan Biaya Pengiriman" value="{{old('biaya_pengiriman')}}" onchange="sub();">
                                @error('biaya_pengiriman')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Sub Total Pengiriman</label>
                                <input class="form-control @error('sub_total_pengiriman')is-invalid @enderror" type="number" id="sub_total_pengiriman" name="sub_total_pengiriman" placeholder="Sub Total" required value="{{old('sub_total_pengiriman')}}" onchange="reSum();">
                                @error('sub_total_pengiriman')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            </br>
                            <button class="btn btn-primary mt-12" type="submit">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function reSum() {
            var num1 = parseInt(document.getElementById("banyak_beli").value);
            var num2 = parseInt(document.getElementById("harga").value);
            document.getElementById("total_pembelian").value = num1 * num2;

        }

        function sub() {
            var num1 = parseInt(document.getElementById("total_pembelian").value);
            var num2 = parseInt(document.getElementById("biaya_pengiriman").value);
            document.getElementById("sub_total_pengiriman").value = num1 + num2;

        }
    </script>
    @endsection