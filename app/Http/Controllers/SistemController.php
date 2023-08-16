<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengiriman;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Customer;
use App\Models\Barang;
use App\Models\BahanBaku;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class SistemController extends Controller
{
    public function PembelianIndex()
    {
        $pembelian = DB::table('tb_pembelian as a')
            ->select('a.*', 'b.nama_supplier', 'b.alamat', 'b.no_telp', 'c.nama', 'd.*')
            ->join('tb_supplier as b', 'a.id_supplier', '=', 'b.id_supplier')
            ->join('tb_bahanbaku as d', 'a.id_bahanbaku', '=', 'd.id_bahanbaku')
            ->join('users as c', 'a.id_admin', '=', 'c.id')
            ->paginate(5);
        return view('admin.pembelian.index', compact('pembelian'));
    }
    public function PembelianCreate()
    {
        $pembelian = DB::table('tb_pembelian as a')
            ->select('a.*', 'b.nama_supplier', 'b.alamat', 'b.no_telp', 'c.nama')
            ->join('tb_supplier as b', 'a.id_supplier', '=', 'b.id_supplier')
            ->join('users as c', 'a.id_admin', '=', 'c.id')
            ->get();
        $customer = Customer::get();
        $supplier = Supplier::get();
        $baku = BahanBaku::get();
        return view('admin.pembelian.create', compact('pembelian', 'customer', 'supplier', 'baku'));
    }
    public function PembelianStore(Request $request)
    {
        $user = Auth::user()->id;
        $ValidatedData = $request->validate([
            'id_supplier' => ['required'],
            'id_bahanbaku' => ['required'],
            'tanggal_beli' => ['required'],
            'banyak_beli' => ['required'],
            'harga' => ['required'],
            'total_pembelian' => ['required'],
        ]);
        Pembelian::create([
            'id_supplier' => $request->id_supplier,
            'id_admin' => $user,
            'id_bahanbaku' => $request->id_bahanbaku,
            'tanggal_beli' => $request->tanggal_beli,
            'banyak_beli' => $request->banyak_beli,
            'harga' => $request->harga,
            'total_pembelian' => $request->total_pembelian
        ]);
        return redirect()->back()
            ->with('success', 'Data Supplier Berhasil Disimpan');
    }
    public function PembelianEdit(Request $request, $id_pembelian)
    {
        $data = Pembelian::findOrFail($id_pembelian);
        $pembelian = Pembelian::find($id_pembelian);
        $baku = DB::table('tb_pembelian as a')
            ->select('a.*', 'b.nama_supplier', 'c.nama_bahanbaku', 'd.nama as nama_admin')
            ->join('tb_supplier as b', 'a.id_supplier', '=', 'b.id_supplier')
            ->join('tb_bahanbaku as c', 'a.id_bahanbaku', '=', 'c.id_bahanbaku')
            ->join('users as d', 'a.id_admin', '=', 'd.id')
            ->get()->first();
        $supplier = Supplier::get();
        return view('admin.pembelian.edit', compact('data', 'pembelian', 'supplier', 'baku'));
    }
    public function PembelianEditPost(Request $request, $id_pembelian)
    {
        $user = Auth::user()->id;
        $data = Pembelian::find($id_pembelian);
        $ValidatedData = $request->validate([
            'id_supplier' => ['required'],
            'id_bahanbaku' => ['required'],
            'tanggal_beli' => ['required'],
            'banyak_beli' => ['required'],
            'harga' => ['required'],
            'total_pembelian' => ['required'],
        ]);
        $data->id_supplier     = $ValidatedData['id_supplier'];
        $data->id_admin     = $user;
        $data->id_bahanbaku     = $ValidatedData['id_bahanbaku'];
        $data->tanggal_beli     = $ValidatedData['tanggal_beli'];
        $data->banyak_beli   = $ValidatedData['banyak_beli'];
        $data->harga = $ValidatedData['harga'];
        $data->total_pembelian = $ValidatedData['total_pembelian'];

        $data->save();

        return back()->with('success', 'Data Pembelian Berhasil Diupdate');
    }
    public function PembelianHapus(Request $request, $id_pembelian)
    {
        $data = Pembelian::find($id_pembelian);
        $data->delete();

        return back()
            ->with('success', 'Data Pembelian Berhasil Dihapus');
    }
    public function PenjualanIndex()
    {
        $penjualan = DB::table('tb_penjualan_barang as a')
            ->select('a.*', 'b.nama_customer')
            ->join('tabel_customer as b', 'a.id_customer', '=', 'b.id_customer')
            ->paginate(5);
        $customer = Customer::get();
        return view('admin.penjualan.index', compact('penjualan', 'customer'));
    }
    public function PenjualanCreate()
    {
        $penjualan = Penjualan::get();
        $barang = Barang::get();
        $customer = Customer::get();
        return view('admin.penjualan.create', compact('penjualan', 'customer', 'barang'));
    }
    public function PenjualanStore(Request $request)
    {
        $user = Auth::user()->id;
        $ValidatedData = $request->validate([
            'id_barang' => ['required'],
            'id_customer' => ['required'],
            'tanggal_beli' => ['required'],
            'jenis_barang' => ['required'],
            'banyak_beli' => ['required'],
            'harga' => ['required'],
            'total_pembelian' => ['required'],
        ]);
        Penjualan::create([
            'id_user' => $user,
            'id_pengiriman' => null,
            'id_customer' => $request->id_customer,
            'id_barang' => $request->id_barang,
            'jenis_barang' => $request->jenis_barang,
            'tanggal_beli' => $request->tanggal_beli,
            'banyak_beli' => $request->banyak_beli,
            'harga' => $request->harga,
            'total_pembelian' => $request->total_pembelian
        ]);
        return redirect()->back()
            ->with('success', 'Data Penjualan Berhasil Disimpan');
    }
    public function PenjualanEdit(Request $request, $id_penjualan)
    {
        $jnis = Penjualan::findOrFail($id_penjualan)->get()->value('jenis_barang');
        $data = Penjualan::find($id_penjualan);
        $customer = Penjualan::findOrFail($id_penjualan)->get()->value('id_customer');
        $namacust = Customer::where('id_customer', '=', $customer)->get()->value('nama_customer');
        return view('admin.penjualan.edit', compact('data', 'jnis', 'customer', 'namacust'));
    }
    public function PenjualanEditPost(Request $request, $id_penjualan)
    {
        $data = Penjualan::find($id_penjualan);
        $ValidatedData = $request->validate([
            'id_barang' => ['required'],
            'id_customer' => ['required'],
            'tanggal_beli' => ['required'],
            'jenis_barang' => ['required'],
            'banyak_beli' => ['required'],
            'harga' => ['required'],
            'total_pembelian' => ['required'],
        ]);
        $data->id_barang     = $ValidatedData['id_barang'];
        $data->id_customer   = $ValidatedData['id_customer'];
        $data->tanggal_beli = $ValidatedData['tanggal_beli'];
        $data->jenis_barang = $ValidatedData['jenis_barang'];
        $data->banyak_beli = $ValidatedData['banyak_beli'];
        $data->harga = $ValidatedData['harga'];
        $data->total_pembelian = $ValidatedData['total_pembelian'];

        $data->save();

        return back()->with('success', 'Data Penjualan Berhasil Diupdate');
    }
    public function PenjualanHapus(Request $request, $id_penjualan)
    {
        $data = Penjualan::find($id_penjualan);
        $data->delete();

        return back()
            ->with('success', 'Data Penjualan Berhasil Dihapus');
    }
    public function PengirimanIndex()
    {
        $kirim = Pengiriman::value('id_pengiriman');
        $penjualan = Penjualan::whereNull('id_pengiriman')->get();
        $pengiriman = DB::table('tb_penjualan_barang as a')
            ->select('a.*', 'b.*', 'c.*', 'd.*')
            ->join('users as b', 'a.id_user', '=', 'b.id')
            ->join('tb_beban_pengiriman as c', 'a.id_pengiriman', '=', 'c.id_pengiriman')
            ->join('tabel_customer as d', 'a.id_customer', '=', 'd.id_customer')
            ->get();
        return view('admin.beban.index', compact('pengiriman', 'penjualan'));
    }
    public function PengirimanCreate()
    {
        $customer = Customer::get();
        $barang = Penjualan::get();
        return view('admin.beban.create', compact('customer', 'barang'));
    }
    public function PengirimanStore(Request $request)
    {
        $ValidatedData = $request->validate([
            'id_customer' => ['required'],
            'biaya_pengiriman' => ['required'],
            'sub_total_pengiriman' => ['required']
        ]);
        Pengiriman::create($ValidatedData);
    }
    public function PengirimanEdit(Request $request, $id_penjualan)
    {
        $data = Penjualan::find($id_penjualan)->first();
        return view('admin.beban.edit', compact('data'));
    }

    public function PengirimanKonfirm(Request $request, $id_penjualan)
    {
        $jnis = Penjualan::findOrFail($id_penjualan)->get()->value('jenis_barang');
        $data = Penjualan::find($id_penjualan);
        $idkirim = Penjualan::find($id_penjualan)->get()->value('id_pengiriman');
        $kirim = Pengiriman::where('id_pengiriman', $idkirim)->first();
        $customer = Penjualan::findOrFail($id_penjualan)->get()->value('id_customer');
        $namacust = Customer::where('id_customer', '=', $customer)->get()->value('nama_customer');
        return view('admin.penjualan.konfirm', compact('data', 'jnis', 'customer', 'namacust', 'kirim'));
    }

    public function PengirimanKonfirmPost(Request $request)
    {
        $id_penjualan = $request->id_penjualan;
        $data = Penjualan::find($id_penjualan);
        $ValidatedData = $request->validate([
            'id_barang' => ['required'],
            'biaya_pengiriman' => ['required'],
            'sub_total_pengiriman' => ['required']
        ]);
        Pengiriman::create([
            'id_barang'         => $request->id_barang,
            'biaya_pengiriman'   => $request->biaya_pengiriman,
            'sub_total_pengiriman' => $request->sub_total_pengiriman
        ]);
        $idkirim = Pengiriman::orderBy('id_pengiriman', 'desc')->value('id_pengiriman');
        Penjualan::where('id_penjualan', '=', $id_penjualan)
            ->update([
                'id_pengiriman' => $idkirim
            ]);
        return back()->with('success', 'Data Pengiriman Berhasil Dibuat');
    }
    public function PengirimanEditPost(Request $request, $id_penjualan)
    {
        $data = Penjualan::find($id_penjualan);
        $user = Auth::user()->id;
        $ValidatedData = $request->validate([
            'id_barang' => ['required'],
            'biaya_pengiriman' => ['required'],
            'sub_total_pengiriman' => ['required']
        ]);
        $pengiriman = Pengiriman::create([
            'id_barang'         => $request->id_barang,
            'biaya_pengiriman'   => $request->biaya_pengiriman,
            'sub_total_pengiriman' => $request->sub_total_pengiriman
        ]);
        $idkirim = Pengiriman::orderBy('id_pengiriman', 'desc')->value('id_pengiriman');
        $update = Penjualan::where('id_penjualan', '=', $id_penjualan)
            ->update([
                'id_pengiriman' => $idkirim
            ]);
        return back()->with('success', 'Data Pengirimsn Berhasil Diupdate');
    }
    public function PengirimanPost(Request $request, $id_pengiriman)
    {
        $data = Pengiriman::find($id_pengiriman);
        $user = Auth::user()->id;
        $ValidatedData = $request->validate([
            'id_user' => ['required'],
            'id_pembeian' => ['required'],
            'banyak_beli' => ['required'],
            'harga' => ['required'],
            'total_pembelian' => ['required'],
        ]);
        $data->id_user     = $user;
        $data->id_pembeian     = $ValidatedData['id_pembeian'];
        $data->banyak_beli   = $ValidatedData['banyak_beli'];
        $data->harga = $ValidatedData['harga'];
        $data->total_pembelian = $ValidatedData['total_pembelian'];

        $data->save();

        return back()->with('success', 'Data Pengiriman Berhasil Diupdate');
    }
    public function PengirimanHapus(Request $request, $id_pengiriman)
    {
        $data = Pengiriman::find($id_pengiriman);
        $data->delete();

        return back()
            ->with('success', 'Data Pengiriman Berhasil Dihapus');
    }
    public function SupplierIndex()
    {
        $supplier = Supplier::paginate(5);
        return view('admin.supplier.index', compact('supplier'));
    }
    public function SupplierCreate()
    {
        $supplier = Supplier::paginate(5);
        return view('admin.supplier.create', compact('supplier'));
    }
    public function SupplierStore(Request $request)
    {
        $ValidatedData = $request->validate([
            'nama_supplier' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
        ]);
        Supplier::create($ValidatedData);
        return redirect()->back()
            ->with('success', 'Data Supplier Berhasil Disimpan');
    }
    public function SupplierEdit(Request $request, $id_supplier)
    {
        $data = Supplier::find($id_supplier);
        return view('admin.supplier.edit', compact('data'));
    }
    public function SupplierEditPost(Request $request, $id_supplier)
    {
        $data = Supplier::find($id_supplier);
        $ValidatedData = $request->validate([
            'nama_supplier' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
        ]);
        $data->nama_supplier     = $ValidatedData['nama_supplier'];
        $data->alamat   = $ValidatedData['alamat'];
        $data->no_telp = $ValidatedData['no_telp'];

        $data->save();

        return back()->with('success', 'Data Supplier Berhasil Diupdate');
    }
    public function SupplierHapus($id_supplier)
    {
        $data = Supplier::find($id_supplier);
        $data->delete();

        return back()
            ->with('success', 'Data Barang Berhasil Dihapus');
    }
    public function CustomerIndex()
    {
        $customer = Customer::paginate(5);
        return view('admin.customer.index', compact('customer'));
    }
    public function CustomerCreate()
    {
        $customer = Customer::get();
        return view('admin.customer.create', compact('customer'));
    }
    public function CustomerStore(Request $request)
    {
        $ValidatedData = $request->validate([
            'nama_customer' => ['required'],
            'email' => ['required'],
            'alamat' => ['required'],
            'No_telp' => ['required'],
            'jenis_kelamin' => ['required'],
        ]);
        Customer::create($ValidatedData);
        return redirect()->back()
            ->with('success', 'Data Customer Berhasil Disimpan');
    }
    public function CustomerEdit(Request $request, Customer $customer, $id_customer)
    {
        $jnis = Customer::findOrFail($id_customer)->get()->value('jenis_kelamin');
        $data = Customer::find($id_customer);
        return view('admin.customer.edit', compact('data', 'jnis'));
    }
    public function CustomerEditPost(Request $request, Customer $customer, $id_customer)
    {
        $data = Customer::find($id_customer);
        $ValidatedData = $request->validate([
            'nama_customer' => ['required'],
            'email' => ['required'],
            'alamat' => ['required'],
            'No_telp' => ['required'],
            'jenis_kelamin' => ['required'],
        ]);
        $data->nama_customer     = $ValidatedData['nama_customer'];
        $data->email     = $ValidatedData['email'];
        $data->alamat   = $ValidatedData['alamat'];
        $data->No_telp = $ValidatedData['No_telp'];
        $data->jenis_kelamin   = $ValidatedData['jenis_kelamin'];

        $data->save();

        return back()->with('success', 'Data Customer Berhasil Diupdate');
    }
    public function CustomerHapus($id_customer)
    {
        $data = Customer::find($id_customer);
        $data->delete();

        return back()
            ->with('success', 'Data Customer Berhasil Dihapus');
    }
    public function BarangIndex()
    {
        $barang = Barang::paginate(5);
        return view('admin.barang.index', compact('barang'));
    }
    public function BarangCreate()
    {
        $barang = Barang::get();
        return view('admin.barang.create', compact('barang'));
    }
    public function BarangStore(Request $request)
    {
        $ValidatedData = $request->validate([
            'jenis_barang' => ['required'],
            'nama_barang' => ['required', 'max:20'],
            'stok_barang' => ['required', 'max:100'],
            'harga_jual' => ['required', 'max:10'],
            'total' => ['required', 'max:30'],
        ]);
        Barang::create($ValidatedData);
        return redirect()->back()
            ->with('success', 'Data Barang Berhasil Disimpan');
    }
    public function BarangEdit(Request $request, $id_barang)
    {
        $jnis = Barang::findOrFail($id_barang)->get()->value('jenis_barang');
        $data = Barang::find($id_barang);
        return view('admin.barang.edit', compact('data', 'jnis'));
    }
    public function BarangEditPost(Request $request, Barang $barang, $id_barang)
    {
        $data = Barang::find($id_barang);
        $validatedData = $request->validate([
            'jenis_barang' => ['required'],
            'nama_barang' => ['required', 'max:20'],
            'stok_barang' => ['required', 'max:100'],
            'harga_jual' => ['required', 'max:10'],
            'total' => ['required', 'max:30'],
        ]);
        $data->jenis_barang     = $validatedData['jenis_barang'];
        $data->nama_barang     = $validatedData['nama_barang'];
        $data->stok_barang   = $validatedData['stok_barang'];
        $data->harga_jual = $validatedData['harga_jual'];
        $data->total   = $validatedData['total'];

        $data->save();

        return back()->with('success', 'Data Barang Berhasil Diupdate');
    }
    public function BarangHapus($id_barang)
    {
        $data = Barang::find($id_barang);
        $data->delete();

        return back()
            ->with('success', 'Data Barang Berhasil Dihapus');
    }
    public function BahanBakuIndex()
    {
        $bahanbaku = BahanBaku::paginate(5);
        return view('admin.baku.index', compact('bahanbaku'));
    }
    public function BahanBakuCreate()
    {
        $bahanbaku = BahanBaku::get();
        return view('admin.baku.create', compact('bahanbaku'));
    }
    public function BahanBakuStore(Request $request)
    {
        $ValidatedData = $request->validate([
            'nama_bahanbaku' => ['required'],
            'jenis_bahanbaku' => ['required', 'max:20'],
        ]);
        BahanBaku::create($ValidatedData);
        return redirect()->back()
            ->with('success', 'Data Bahan Baku Berhasil Disimpan');
    }
    public function BahanBakuEdit(Request $request, $id_bahanbaku)
    {
        $jnis = BahanBaku::findOrFail($id_bahanbaku)->get()->value('jenis_bahanbaku');
        $data = BahanBaku::find($id_bahanbaku);
        return view('admin.baku.edit', compact('data', 'jnis'));
    }
    public function BahanBakuEditPost(Request $request, $id_bahanbaku)
    {
        $data = BahanBaku::find($id_bahanbaku);
        $validatedData = $request->validate([
            'nama_bahanbaku' => ['required'],
            'jenis_bahanbaku' => ['required', 'max:20'],
        ]);
        $data->nama_bahanbaku     = $validatedData['nama_bahanbaku'];
        $data->jenis_bahanbaku     = $validatedData['jenis_bahanbaku'];

        $data->save();

        return back()->with('success', 'Data Bahan Baku Berhasil Diupdate');
    }
    public function BahanBakuHapus($id_bahanbaku)
    {
        $data = BahanBaku::find($id_bahanbaku);
        $data->delete();

        return back()
            ->with('success', 'Data Bahan Baku Berhasil Dihapus');
    }
}
