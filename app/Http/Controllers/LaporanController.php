<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\File;

class LaporanController extends Controller
{
    public function PengirimanIndex()
    {
        $kirim = Pengiriman::value('id_pengiriman');
        $penjualan = Penjualan::whereNull('id_pengiriman')->get();
        $pengiriman = DB::table('tb_penjualan_barang as a')
            ->select('a.*', 'b.*', 'c.*', 'd.*')
            ->join('users as b', 'a.id_user', '=', 'b.id')
            ->join('tb_beban_pengiriman as c', 'a.id_pengiriman', '=', 'c.id_pengiriman')
            ->join('tabel_customer as d', 'a.id_customer', '=', 'd.id_customer')
            ->paginate(5);
        return view('Laporan.Beban', compact('pengiriman', 'penjualan'));
    }
    public function PengirimanPDF()
    {
        $Pengiriman = DB::table('tb_penjualan_barang as a')
            ->select('a.*', 'b.*', 'c.*', 'd.*')
            ->join('users as b', 'a.id_user', '=', 'b.id')
            ->join('tb_beban_pengiriman as c', 'a.id_pengiriman', '=', 'c.id_pengiriman')
            ->join('tabel_customer as d', 'a.id_customer', '=', 'd.id_customer')
            ->get();
        $currentTime = Carbon::now();
        $tgl = $currentTime->toDateString();
        $pdfPengiriman = FacadePdf::loadView('Laporan.PDF.Beban', compact('Pengiriman', 'tgl'))->setPaper('a4', 'portrait');
        return $pdfPengiriman->stream('laporan-beban-pengiriman' . '.pdf');
    }
    public function PenjualanIndex()
    {
        $Penjualan = DB::table('tb_penjualan_barang as a')
            ->select('a.*', 'b.nama_customer')
            ->join('tabel_customer as b', 'a.id_customer', '=', 'b.id_customer')
            ->paginate(5);

        return view('Laporan.Penjualan', compact('Penjualan'));
    }
    public function PenjualanPDF()
    {
        $Penjualan = DB::table('tb_penjualan_barang as a')
            ->select('a.*', 'b.nama_customer')
            ->join('tabel_customer as b', 'a.id_customer', '=', 'b.id_customer')
            ->paginate(5);

        $currentTime = Carbon::now();
        $tgl = $currentTime->toDateString();
        $pdfPenjualan = FacadePdf::loadView('Laporan.PDF.Penjualan', compact('Penjualan', 'tgl'))->setPaper('a4', 'portrait');
        return $pdfPenjualan->stream('laporan-penjualan' . '.pdf');
    }
    public function PembelianIndex()
    {
        $pembelian = DB::table('tb_pembelian as a')
            ->select('a.*', 'b.nama_supplier', 'b.alamat', 'b.no_telp', 'c.nama')
            ->join('tb_supplier as b', 'a.id_supplier', '=', 'b.id_supplier')
            ->join('users as c', 'a.id_admin', '=', 'c.id')
            ->paginate(5);
        $supplier = Supplier::get();
        return view('Laporan.Pembelian', compact('pembelian', 'supplier'));
    }
    public function PembelianPDF()
    {
        $pembelian = DB::table('tb_pembelian as a')
            ->select('a.*', 'b.nama_supplier', 'b.alamat', 'b.no_telp', 'c.nama')
            ->join('tb_supplier as b', 'a.id_supplier', '=', 'b.id_supplier')
            ->join('users as c', 'a.id_admin', '=', 'c.id')
            ->paginate(5);
        $currentTime = Carbon::now();
        $tgl = $currentTime->toDateString();
        $supplier = Supplier::get();
        $pdfPembelian = FacadePdf::loadView('Laporan.PDF.Pembelian', compact('pembelian', 'supplier', 'tgl'))->setPaper('a4', 'portrait');
        return $pdfPembelian->stream('laporan-pembelian' . '.pdf');
    }

    public function BarangIndex()
    {
        $barang = barang::paginate(5);
        return view('Laporan.Barang', compact('barang'));
    }
    public function BarangPDF()
    {
        $barang = Barang::get();
        $currentTime = Carbon::now();
        $tgl = $currentTime->toDateString();
        $pdfBarang = FacadePdf::loadView('Laporan.PDF.Barang', compact('barang', 'tgl'))->setPaper('a4', 'portrait');
        return $pdfBarang->stream('laporan-barang' . '.pdf');
    }

    public function BakuIndex()
    {
        $baku = BahanBaku::paginate(5);
        return view('Laporan.Baku', compact('baku'));
    }
    public function BakuPDF()
    {
        $baku = BahanBaku::get();
        $currentTime = Carbon::now();
        $tgl = $currentTime->toDateString();
        $pdfBaku = FacadePdf::loadView('Laporan.PDF.Baku', compact('baku', 'tgl'))->setPaper('a4', 'portrait');
        return $pdfBaku->stream('laporan-bahan-baku' . '.pdf');
    }
}
