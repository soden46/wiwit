@extends('layouts.app',[
'title' => 'Form Data Supplier',
'pageTitle' => 'Form Data Supplier'
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
                <h1>Form Data Supplier</h1>
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
                        <h3 class="card-title">Masukan Data Supplier</h3>
                    </div>
                    <form id="quickForm" action="/supplier/create/store" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="floatingInput">Nama Supplier</label>
                                <input type="text" name="nama_supplier" class="form-control @error('nama_supplier')is-invalid @enderror" id="floatingInput" placeholder="Nama Supplier" required value="{{old('nama_supplier')}}">
                                @error('nama_supplier')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Alamat</label>
                                <input type="text" name="alamat" class="form-control @error('alamat')is-invalid @enderror" id="floatingInput" placeholder="Masukan Alamat" required value="{{old('alamat')}}">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">No Telpon</label>
                                <input class="form-control @error('no_telp')is-invalid @enderror" type="number" id="no_telp" name="no_telp" placeholder="Masukan Nomor Telpon" required>
                                @error('no_telp')
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
    <script>
        function reSum() {
            var num1 = parseInt(document.getElementById("banyak_beli").value);
            var num2 = parseInt(document.getElementById("harga").value);
            document.getElementById("total_pembelian").value = num1 * num2;

        }
    </script>
    @endsection