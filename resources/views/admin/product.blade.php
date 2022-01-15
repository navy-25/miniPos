@extends('layouts.master')

@section('nav-produk')
active
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-7">
        <h1 class="t-dark">Master Product</h1>
    </div>
    <div class="col-5" >
        <button
            class="btn btn-sm btn-primary"
            style="float: right"
            data-bs-toggle="modal"
            data-bs-target="#modal-Add">
            Tambah <i class="ms-2" data-feather="plus-circle" width="13" height="13" ></i>
        </button>
    </div>
    <!-- Modal Store -->
    <div class="modal fade" id="modal-Add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title t-dark" id="staticBackdropLabel">Tambah Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input id="nama_produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="masukkan nama produk" required autocomplete="nama_produk" autofocus>
                            @error('nama_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            @php
                                $supplier = \App\Models\MasterSupplier::all();
                            @endphp
                            <label class="form-label">Supplier</label>
                            <select class="form-select" name="id_supplier">
                                <option selected>-- Pilih Supplier --</option>
                                @foreach ($supplier as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            @php
                                $kategori = \App\Models\MasterKategori::all();
                            @endphp
                            <label class="form-label">Kategori</label>
                            <select class="form-select" name="id_kategori">
                                <option selected>-- Pilih Kategori --</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Produk</label>
                            <input id="harga" type="number" minlength="4" min="1000" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="masukkan nama produk" required autocomplete="harga">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" name="deskripsi_produk" rows="3" aria-label="Deskripsi produk"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Pilih Gambar</label>
                            <input class="form-control" style="padding-top:5px;padding-bottom:5px" type="file" name="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="reset_form(['nama_produk','harga'])" class="btn btn-outline-muted" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabel-data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Supplier</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $x)
                        @php
                            $kategori = \App\Models\MasterKategori::find($x->id_kategori);
                            $supplier = \App\Models\MasterSupplier::find($x->id_supplier);
                        @endphp
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>
                                @if ($x->gambar == "")
                                    <a href="no_Image.jpg" target="_blank">
                                        <img src="no_Image.jpg" alt="no_Image.jpg" width="50px">
                                    </a>
                                @else
                                    <a href="uploads/gambar/{{ $x->gambar }}" target="_blank">
                                        <img src="uploads/gambar/{{ $x->gambar }}" alt="{{ $x->gambar }}" width="50px">
                                    </a>
                                @endif
                            </td>
                            <td>{{ $x->nama_produk }}</td>
                            <td>{{ $supplier->nama_supplier }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td>{{ $x->deskripsi_produk }}</td>
                            <td>Rp. {{ number_format($x->harga,2,',','.') }}</td>
                            <td>
                                <button
                                    onclick="modal_update_product('{{ $x }}','{{ route('update_product',['id'=>$x->id]) }}')"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-Update"
                                    type="button"
                                    title="Ubah data"
                                    class="btn btn-sm btn-primary btn-icon">
                                    <i data-feather="edit-2" width="13" height="13"></i>
                                </button>
                                <button
                                    onclick="delete_confirm('{{ $x->nama_produk }}','{{ route('destroy_product',['id'=>$x->id]) }}')"
                                    type="button"
                                    title="Hapus data"
                                    class="btn btn-sm btn-outline-muted btn-icon">
                                    <i data-feather="trash" width="13" height="13"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Update -->
<div class="modal fade" id="modal-Update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title t-dark" id="staticBackdropLabel">Update User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" class="modal-update"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input id="nama_produk_update" type="text" class="form-control" name="nama_produk" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select class="form-select select_kategori" name="id_kategori"></select>
                    </div>
                    <div class="mb-3">
                        <label>Supplier</label>
                        <select class="form-select select_supplier" name="id_supplier"></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Produk</label>
                        <input id="harga_update" type="number" minlength="4" min="1000" class="form-control" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk_update" rows="3" aria-label="Deskripsi produk"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Pilih Gambar</label>
                        <input class="form-control" style="padding-top:5px;padding-bottom:5px" type="file" name="gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="reset_form(['nama_produk','harga'])" class="btn btn-outline-muted" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
