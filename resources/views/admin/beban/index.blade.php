@extends('layouts.app',[
'title' => 'Data Beban Pengiriman',
'pageTitle' => 'Data Beban Pengiriman'
])
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tabel Data Beban Pengiriman</h1>
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
                    <h3 class="card-title">Data Beban Pengiriman Yang Sudah Dikonfirmasi</h3>
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
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                    <thead>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering ID Beban Pengiriman: activate to sort column descending">ID Beban Pengiriman</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Nama Admin: activate to sort column ascending">Nama Admin</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Nama Customer: activate to sort column ascending">Nama Customer</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Nama Barang: activate to sort column ascending">ID Barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Jenis Barang: activate to sort column ascending">Jenis Barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Harga: activate to sort column ascending">Harga</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Biaya Pengiriman: activate to sort column ascending">Biaya Pengiriman</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Sub Total Pengiriman: activate to sort column ascending">Sub Total Pengiriman</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering Aksi: activate to sort column ascending">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($pengiriman as $data)
                                    <tbody>
                                        <tr>
                                            <td>{{ $data->id_pengiriman }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->nama_customer}}</td>
                                            <td>{{ $data->id_barang}}</td>
                                            <td>{{ $data->jenis_barang}}</td>
                                            <td>{{ $data->total_pembelian }}</td>
                                            <td>{{ $data->biaya_pengiriman }}</td>
                                            <td>{{ $data->sub_total_pengiriman }}</td>
                                            <td>
                                                <div class="btn-group" style="width:135px">
                                                    <form action="{{ route('beban/pengiriman/hapus',$data->id_penjualan) }}" method="POST">
                                                        <a class="btn btn-primary" href="{{ route('beban/pengiriman/edit',$data->id_penjualan) }}">Edit</a>
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</section>
@endsection