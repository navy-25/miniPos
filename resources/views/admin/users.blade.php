@extends('layouts.master')

@section('nav-user')
active
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-7">
        <h1 class="t-dark">Master Users</h1>
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
                    <h5 class="modal-title t-dark" id="staticBackdropLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store_users') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="masukkan username anda" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="contoh : user@gmail.com"  required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" minlength="8" name="password" placeholder="min. 8 huruf" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Ulangi Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" minlength="8" placeholder="ulangi password anda dengan benar"  required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="reset_form(['name','email','password','password-confirm'])" class="btn btn-outline-muted" data-bs-dismiss="modal">Batal</button>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
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
                            <td>{{ $x->name }}</td>
                            <td>{{ $x->email }}</td>
                            <td>
                                <span class="badge bg-{{ $x->status == "Pelanggan" ? "primary" : "info" }}">{{ $x->status }}</span>
                            </td>
                            <td>
                                <button
                                    onclick="modal_update_users('{{ $x }}','{{ route('update_users',['id'=>$x->id]) }}')"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-Update"
                                    type="button"
                                    title="Ubah data"
                                    class="btn btn-sm btn-primary btn-icon">
                                    <i data-feather="edit-2" width="13" height="13"></i>
                                </button>
                                <button
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-Passwords"
                                    type="button"
                                    title="Ganti Password"
                                    class="btn btn-sm btn-outline-muted btn-icon">
                                    <i data-feather="lock" width="13" height="13"></i>
                                </button>
                                <!-- Modal Passwords -->
                                <div class="modal fade" id="modal-Passwords" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title t-dark" id="staticBackdropLabel">Ganti Password User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('update_password_users',['id'=>$x->id]) }}" class="modal-update" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password Lama</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" minlength="8" name="password" placeholder="min. 8 huruf" required autocomplete="new-password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new-password" class="form-label">Password Baru</label>
                                                        <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" minlength="8" name="new_password" placeholder="min. 8 huruf" required autocomplete="new-password">
                                                        @error('new-password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" onclick="reset_form(['name','email','password','password-confirm'])" class="btn btn-outline-muted" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    onclick="delete_confirm('{{ $x->name }}','{{ route('destroy_users',['id'=>$x->id]) }}')"
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
            <form action="" class="modal-update" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name-update" class="form-label">Username</label>
                        <input id="name-update" type="text" class="form-control @error('name-update') is-invalid @enderror" name="name" placeholder="masukkan username anda" required autocomplete="name-update" autofocus>
                        @error('name-update')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email-update" class="form-label">Email</label>
                        <input id="email-update" type="email" class="form-control @error('email-update') is-invalid @enderror" name="email" placeholder="contoh : user@gmail.com"  required autocomplete="email-update">
                        @error('email-update')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="reset_form(['name','email','password','password-confirm'])" class="btn btn-outline-muted" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
