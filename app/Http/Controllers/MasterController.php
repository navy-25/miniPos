<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterKategori;
use App\Models\MasterSupplier;
use App\Models\MasterPelanggan;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function list_supplier()
    {
        $data = MasterSupplier::orderBy('nama_supplier')->get();
        return view('admin.supplier', compact('data'));
    }
    public function list_kategori()
    {
        $data = MasterKategori::orderBy('nama_kategori')->get();
        return view('admin.kategori', compact('data'));
    }
    public function list_pelanggan()
    {
        $data = MasterPelanggan::orderBy('nama_pelanggan')->get();
        return view('admin.pelanggan', compact('data'));
    }
    public function destroy_master($id, $type)
    {
        try {
            if ($type == "Pelanggan") {
                $data = MasterPelanggan::find($id);
                $data->delete($data);
                return redirect()->back()->with('success', 'Berhasil menghapus pelanggan ' . $data->nama_pelanggan);
            } else if ($type == "Supplier") {
                $is_foreign = DB::table('products')->where('id_supplier', $id)->count();
                $data = MasterSupplier::find($id);
                if ($is_foreign == 0) {
                    $data->delete($data);
                    return redirect()->back()->with('success', 'Berhasil menghapus supplier ' . $data->nama_supplier);
                } else {
                    return redirect()->back()->with('error', 'Supplier ' . $data->nama_supplier . ' masih digunakan');
                }
            } else if ($type == "Kategori") {
                $is_foreign = DB::table('products')->where('id_kategori', $id)->count();
                $data = MasterKategori::find($id);
                if ($is_foreign == 0) {
                    $data->delete($data);
                    return redirect()->back()->with('success', 'Berhasil menghapus kategori ' . $data->nama_kategori);
                } else {
                    return redirect()->back()->with('error', 'Kategori ' . $data->nama_kategori . ' masih digunakan');
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function store_kategori(Request $request)
    {
        try {
            $data = MasterKategori::create([
                'nama_kategori' => $request->nama_kategori,
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan kategori ' . $data->nama_kategori);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function update_kategori($id, Request $request)
    {
        try {
            $data = MasterKategori::find($id);
            $data->update([
                'nama_kategori' => $request->nama_kategori,
            ]);
            return redirect()->back()->with('success', 'Berhasil memperbarui kategori ' . $data->nama_kategori);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function store_supplier(Request $request)
    {
        try {
            $data = MasterSupplier::create([
                'nama_supplier' => $request->nama_supplier,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan supplier ' . $data->nama_supplier);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function update_supplier($id, Request $request)
    {
        try {
            $data = MasterSupplier::find($id);
            $data->update([
                'nama_supplier' => $request->nama_supplier,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
            ]);
            return redirect()->back()->with('success', 'Berhasil memperbarui supplier ' . $data->nama_supplier);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function store_pelanggan(Request $request)
    {
        try {
            $data = MasterPelanggan::create([
                'nama_pelanggan' => ucfirst($request->nama_pelanggan),
                'telepon' => $request->telepon,
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan pelanggan ' . $data->nama_pelanggan);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function update_pelanggan($id, Request $request)
    {
        try {
            $data = MasterPelanggan::find($id);
            $data->update([
                'nama_pelanggan' => ucfirst($request->nama_pelanggan),
                'telepon' => $request->telepon,
            ]);
            return redirect()->back()->with('success', 'Berhasil memperbarui pelanggan ' . $data->nama_pelanggan);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
