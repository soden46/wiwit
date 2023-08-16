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
                    <form id="quickForm" action="{{route('beban/pengiriman/store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="id_customer">Nama Customer</label>
                                <select id="id_customer" name="id_customer" class="form-control">
                                    <option value="">Nama Customer</option>
                                    @foreach($barang as $data)
                                    <option value="{{$data->id_customer}}">{{$data->nama_customer}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating">
                                <label for="id_penjualan">ID Barang</label>
                                <select id="id_penjualan" name="id_penjualan" class="form-control">
                                    <option value="">Nama Barang</option>
                                    @foreach($barang as $data)
                                    <option value="{{$data->id_penjualan}}">{{$data->nama_barang}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-floating">
                                <label for="floatingInput">Harga</label>
                                <input type="number" name="harga" class="form-control @error('harga')is-invalid @enderror" id="harga" placeholder="Masukan Biaya Pengiriman" required value="{{old('harga')}}" onchange="reSum();">
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Biaya Pengiriman</label>
                                <input type="number" name="biaya_pengiriman" class="form-control @error('biaya_pengiriman')is-invalid @enderror" id="biaya_pengiriman" placeholder="Masukan Biaya Pengiriman" required value="{{old('biaya_pengiriman')}}" onchange="reSum();">
                                @error('biaya_pengiriman')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Sub Total pengiriman</label>
                                <input type="number" name="sub_total_pengiriman" class="form-control @error('sub_total_pengiriman')is-invalid @enderror" id="sub_total_pengiriman" placeholder="Masukan Biaya Pengiriman" required value="{{old('sub_total_pengiriman')}}" onchange="reSum();">
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
</section>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
<script>
    function reSum() {
        var num1 = parseInt(document.getElementById("harga").value);
        var num2 = parseInt(document.getElementById("biaya_pengiriman").value);
        document.getElementById("sub_total_pengiriman").value = num1 + num2;

    }
</script>

@endsection