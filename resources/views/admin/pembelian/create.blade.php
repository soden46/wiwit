@extends('layouts.app',[
'title' => 'Form Data Pembelian',
'pageTitle' => 'Form Data Pembelian',
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
                <h1>Form Data Pembelian</h1>
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
                        <h3 class="card-title">Masukan Data Pembelian</h3>
                    </div>
                    <form id="quickForm" action="/pembelian/create/store" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="id_supplier">Nama Supplier</label>
                                <select id="id_supplier" name="id_supplier" class="form-control">
                                    <option value="">Nama Supplier</option>
                                    @foreach ($supplier as $data)
                                    <option value="{{$data->id_supplier}}">{{$data->nama_supplier}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating">
                                <label for="id_bahanbaku">Nama Bahan Baku</label>
                                <select id="id_bahanbaku" name="id_bahanbaku" class="form-control">
                                    <option value="">Nama Bahan Baku</option>
                                    @foreach ($baku as $data)
                                    <option value="{{$data->id_bahanbaku}}">{{$data->nama_bahanbaku}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Tanggal Beli</label>
                                <input type="date" name="tanggal_beli" class="form-control @error('tanggal_beli')is-invalid @enderror" id="floatingInput" placeholder="Nama Barang" required value="{{old('tanggal_beli')}}">
                                @error('tanggal_beli')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Banyak Beli</label>
                                <input type="number" name="banyak_beli" class="form-control @error('banyak_beli')is-invalid @enderror" id="banyak_beli" placeholder="Banyak Beli" required value="{{old('banyak_beli')}}" onchange="reSum();">
                                @error('banyak_beli')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Harga</label>
                                <input class="form-control @error('harga')is-invalid @enderror" type="number" id="harga" name="harga" placeholder="Masukan Harga" required onchange="reSum();">
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Total Pembelian</label>
                                <input class="form-control @error('total_pembelian')is-invalid @enderror" type="number" name="total_pembelian" id="total_pembelian" placeholder="Total Pembelian">
                                @error('total_pembelian')
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
</section>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<script>
    function reSum() {
        var num1 = parseInt(document.getElementById("harga").value);
        var num2 = parseInt(document.getElementById("banyak_beli").value);
        document.getElementById("total_pembelian").value = num1 * num2;

    }
</script>

@endsection