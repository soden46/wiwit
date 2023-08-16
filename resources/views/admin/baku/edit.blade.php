@extends('layouts.app',[
'title' => 'Form Data Bahan Baku',
'pageTitle' => 'Form Data Bahan Baku',
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
                <h1>Form Data Bahan Baku</h1>
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
                    <form id="quickForm" action="{{route('bahan-baku/edit/post',$data->id_bahanbaku)}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-floating">
                                <label for="floatingInput">Nama Bahan Baku</label>
                                <input type="text" name="nama_bahanbaku" class="form-control @error('nama_bahanbaku')is-invalid @enderror" id="floatingInput" placeholder="Nama Barang" required value="{{$data->nama_bahanbaku}}">
                                @error('nama_bahanbaku')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <label for="jenis_bahanbaku">Jenis Bahan Baku</label>
                                <select id="jenis_bahanbaku" name="jenis_bahanbaku" class="form-control">
                                    <option value="">Jenis Bahan Baku</option>
                                    @if($data->jenis_bahanbaku=='kertas')
                                    <option value="{{$data->jenis_bahanbaku}}" selected>{{ $data->jenis_bahanbaku }}</option>
                                    <option value="plastik">Plastik</option>
                                    @elseif($data->jenis_bahanbaku=='plastik')
                                    <option value="{{$data->jenis_bahanbaku}}" selected>{{ $data->jenis_bahanbaku }}</option>
                                    <option value="kertas">Kertas</option>
                                    @endif
                                </select>
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