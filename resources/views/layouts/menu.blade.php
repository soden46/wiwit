@if(Auth::user()->role=='admin')
<!-- need to remove -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Beranda</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('barang')}}">
        <i class="fas fa-fw fa-users"></i>
        <span>Barang</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('customer')}}">
        <i class="fas fa-fw fa-users"></i>
        <span>Customer</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('supplier')}}">
        <i class="fas fa-fw fa-truck"></i>
        <span>Supplier</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('bahan-baku')}}">
        <i class="fas fa-fw fa-box"></i>
        <span>Bahan Baku</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('beban/pengiriman')}}">
        <i class="fas fa-fw fa-boxes"></i>
        <span>Beban Pengiriman</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('penjualan/barang')}}">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>Penjualan Barang</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('pembelian')}}">
        <i class="fas fa fa-shopping-cart"></i>
        <span>Pembelian Bahan Baku</span>
    </a>
</li>
@endif
<li class="nav-header">Laporan</li>
<li class="nav-item menu-is-opening menu-open">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="display: block;">
        <li class="nav-item">
            <a href="{{route('laporan/bahan/baku')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bahan Baku</p>
            </a>
        </li>
        <ul class="nav nav-treeview" style="display: block;">
            <li class="nav-item">
                <a href="{{route('laporan/barang')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Barang</p>
                </a>
            </li>
            <ul class="nav nav-treeview" style="display: block;">
                <li class="nav-item">
                    <a href="{{route('laporan/penjualan/barang')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penjualan Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('laporan/pembelian/bahan/baku')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pembelian Bahan Baku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('laporan/beban/pengiriman')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Beban Pengiriman</p>
                    </a>
                </li>
            </ul>
</li>