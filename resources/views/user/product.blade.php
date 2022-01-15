@extends('layouts.web')

@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h1 class="t-dark">Product</h1>
    </div>
</div>
@php
    $data = \App\Models\Product::orderBy('nama_produk')->get();
@endphp
<div class="row">
    @foreach ($data as $x)
        <div class="col-3">
            <div class="card">
                <div class="card-body text-center">
                    @if ($x->gambar == "")
                        <a href="no_Image.jpg" target="_blank">
                            <img src="no_Image.jpg" alt="no_Image.jpg" width="100%">
                        </a>
                    @else
                        <a href="uploads/gambar/{{ $x->gambar }}" target="_blank">
                            <img src="uploads/gambar/{{ $x->gambar }}" alt="{{ $x->gambar }}" width="100%">
                        </a>
                    @endif
                    <br>
                    {{ $x->nama_produk }}
                    <br>
                    {{ $x->harga }}
                    <br>
                    {{ $x->deskripsi_produk }}
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
