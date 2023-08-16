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
                    <form id="quickForm" action="{{route('pembelian/edit/post',$pembelian->id_pembelian)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="id_supplier">ID Supplier</label>
                                <input type="text" name="id_supplier" class="form-control @error('id_supplier')is-invalid @enderror" id="floatingInput" placeholder="Tanggal Beli" required value="{{$baku->id_supplier}}" readonly>
                                @error('id_supplier')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="id_bahanbaku">Nama Bahan Baku</label>
                                <input type="text" name="id_bahanbaku" class="form-control @error('id_bahanbaku')is-invalid @enderror" id="floatingInput" placeholder="Tanggal Beli" required value="{{$baku->id_bahanbaku}}" readonly>
                                @error('id_bahanbaku')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Tanggal Beli</label>
                                <input type="date" name="tanggal_beli" class="form-control @error('tanggal_beli')is-invalid @enderror" id="floatingInput" placeholder="Tanggal Beli" required value="{{$baku->tanggal_beli}}">
                                @error('tanggal_beli')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Banyak Beli</label>
                                <input type="number" name="banyak_beli" class="form-control @error('banyak_beli')is-invalid @enderror" id="floatingInput" placeholder="Banyak Beli" required value="{{$baku->banyak_beli}}" onchange="reSum();">
                                @error('banyak_beli')
                                <div class=" invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Harga</label>
                                <input class="form-control @error('harga')is-invalid @enderror" type="number" id="harga" name="harga" placeholder="Masukan Harga" required value="{{$baku->harga}}" onchange="reSum();">
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Total Pembelian</label>
                                <input class="form-control @error('total_pembelian')is-invalid @enderror" type="number" id="total_pembelian" name="total_pembelian" placeholder="Total Pembelian" value="{{old('total_pembelian')}}" onchange="reSum();">
                                @error('total_pembelian')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-12" type="submit">Simpan</button>
                            <div class="card-body">
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