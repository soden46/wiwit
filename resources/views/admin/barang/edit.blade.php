@extends('layouts.app',[
'title' => 'Form Barang',
'pageTitle' => 'Form Barang',
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
                <h1>Form Data Barang</h1>
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
                        <h3 class="card-title">Masukan Data Barang</h3>
                    </div>
                    <form id="quickForm" action="{{route('barang/edit/post',$data->id_barang)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="jenis_barang">Jenis Barang</label>
                                <select id="jenis_barang" name="jenis_barang" class="form-control">
                                    <option value="">Jenis Barang</option>
                                    <option value="{!! $jnis !!}" selected>{!! $jnis !!}</option>
                                    <option value="PE">PE</option>
                                </select>
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Satuan</label>
                                <input type="text" name="satuan" class="form-control @error('satuan')is-invalid @enderror" id="floatingInput" placeholder="Nama Barang" required value="{{$data->satuan}}">
                                @error('satuan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Stok</label>
                                <input type="number" name="stok_barang" class="form-control @error('stok_barang')is-invalid @enderror" id="stok_barang" placeholder="Masukan Stok" required value="{{$data->stok_barang}}" onblur="reSum();">
                                @error('stok_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Harga Jual</label>
                                <input class="form-control @error('harga_jual')is-invalid @enderror" type="number" id="harga_jual" name="harga_jual" placeholder="Masukan Harga Jual" required value="{{$data->harga_jual}}" onblur="reSum();">
                                @error('harga_jual')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="floatingInput">Total</label>
                                <input class="form-control @error('total')is-invalid @enderror" type="number" id="total" name="total" id="total" placeholder="total" value="{{$data->total}}">
                                @error('total')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-12" type="submit">Simpan</button>
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
        var num1 = parseInt(document.getElementById("harga_jual").value);
        var num2 = parseInt(document.getElementById("stok_barang").value);
        document.getElementById("total").value = num1 * num2;

    }
</script>
@endsection