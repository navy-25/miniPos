@extends('layouts.master')

@section('nav-kategori')
active
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-7">
        <h1 class="t-dark">Master Kategori</h1>
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
                    <h5 class="modal-title t-dark" id="staticBackdropLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store_kategori') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input id="nama_kategori" type="text" class="form-control" name="nama_kategori" placeholder="masukkan nama kategori" required autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="reset_form(['nama_kategori'])" class="btn btn-outline-muted" data-bs-dismiss="modal">Batal</button>
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
                        <th>Nama Kategori</th>
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
                            <td>{{ $x->nama_kategori }}</td>
                            <td>
                                <button
                                    onclick="modal_update_kategori('{{ $x }}','{{ route('update_kategori',['id'=>$x->id]) }}')"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-Update"
                                    type="button"
                                    title="Ubah data"
                                    class="btn btn-sm btn-primary btn-icon">
                                    <i data-feather="edit-2" width="13" height="13"></i>
                                </button>
                                <button
                                    onclick="delete_confirm('{{ $x->nama_kategori }}','{{ route('destroy_master',['id'=>$x->id,'type'=>'Kategori']) }}')"
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
                <h5 class="modal-title t-dark" id="staticBackdropLabel">Update Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" class="modal-update"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input id="nama_kategori-update" type="text" class="form-control" name="nama_kategori" required autofocus>
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
