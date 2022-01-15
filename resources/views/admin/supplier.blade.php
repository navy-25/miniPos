@extends('layouts.master')

@section('nav-master')
active
@endsection

@section('nav-supplier')
active
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-7">
        <h1 class="t-dark">Master Supplier</h1>
    </div>
    <div class="col-5">
        <button
            class="btn btn-sm btn-primary"
            style="float: right"
            data-bs-toggle="modal"
            data-bs-target="#modal-Add">
            Tambah <i class="ms-2" data-feather="plus-circle" width="13" height="13"></i>
        </button>
    </div>
    <!-- Modal Store -->
    <div class="modal fade" id="modal-Add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title t-dark" id="staticBackdropLabel">Tambah Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store_supplier') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_supplier" class="form-label">Nama Supplier</label>
                            <input id="nama_supplier" type="text" class="form-control @error('nama_supplier') is-invalid @enderror" name="nama_supplier" placeholder="masukkan nama PT/Instansi supplier" required autocomplete="nama_supplier" autofocus>
                            @error('nama_supplier')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="contoh : user@gmail.com"  required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input id="telepon" type="number" minlength="12" maxlength="15" class="form-control @error('telepon') is-invalid @enderror" name="telepon" placeholder="contoh : 0821xxxxxxxx" required autocomplete="telepon" autofocus>
                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="reset_form(['nama_supplier','email','telepon'])" class="btn btn-outline-muted" data-bs-dismiss="modal">Batal</button>
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
                        <th>Nama Supplier</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $x)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $x->nama_supplier }}</td>
                            <td>{{ $x->email }}</td>
                            <td>{{ $x->telepon }}</td>
                            <td>{{ $x->alamat }}</td>
                            <td>
                                <button
                                    onclick="modal_update_supplier('{{ $x }}','{{ route('update_supplier',['id'=>$x->id]) }}')"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-Update"
                                    type="button"
                                    title="Ubah data"
                                    class="btn btn-sm btn-primary btn-icon">
                                    <i data-feather="edit-2" width="13" height="13"></i>
                                </button>
                                <button
                                    onclick="delete_confirm('{{ $x->nama_supplier }}','{{ route('destroy_master',['id'=>$x->id,'type'=>'Supplier']) }}')"
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
                <h5 class="modal-title t-dark" id="staticBackdropLabel">Update Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" class="modal-update" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Supplier</label>
                        <input id="nama_supplier-update" type="text" class="form-control" name="nama_supplier" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input id="email-update" type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input id="telepon-update" type="number" minlength="12" maxlength="15" class="form-control" name="telepon" required >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat-update" name="alamat" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-muted" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
