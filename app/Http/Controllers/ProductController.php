<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function list_product()
    {
        $data = Product::orderBy('nama_produk')->get();
        return view('admin.product', compact('data'));
    }
    public function store_product(Request $request)
    {
        try {
            $Product = Product::create([
                'nama_produk' =>  $request->nama_produk,
                'deskripsi_produk' =>  $request->deskripsi_produk,
                'harga' =>  $request->harga,
                'id_kategori' => $request->id_kategori,
                'id_supplier' => $request->id_supplier,
            ]);
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = $file->getClientOriginalName();
                $request->file('gambar')->move('uploads/gambar', $filename);
                $Product->gambar = $filename;
                $Product->save();
            }
            return redirect()->back()->with('success', 'Berhasil menambahkan ' . $Product->name);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function destroy_product($id)
    {
        try {
            $Product = Product::find($id);
            $Product->delete($Product);
            return redirect()->back()->with('success', 'Berhasil menghapus ' . $Product->nama_produk);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function update_product($id, Request $request)
    {
        try {
            $Product = Product::find($id);
            $Product->update([
                'nama_produk' =>  $request->nama_produk,
                'deskripsi_produk' =>  $request->deskripsi_produk,
                'harga' =>  $request->harga,
                'id_kategori' => $request->id_kategori,
                'id_supplier' => $request->id_supplier,
            ]);
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = $file->getClientOriginalName();
                $request->file('gambar')->move('uploads/gambar', $filename);
                $Product->gambar = $filename;
                $Product->save();
            }
            return redirect()->back()->with('success', 'Berhasil memperbarui ' . $Product->nama_produk);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
