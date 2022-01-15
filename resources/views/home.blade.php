@extends('layouts.master')
@section('nav-dashboard')
active
@endsection
@section('content')
<div class="row mb-3">
    <div class="col-12">
        <h3 class="t-dark">Daftar Produk</h3>
    </div>
</div>
@php
    $data = \App\Models\Product::orderBy('nama_produk')->paginate(8);
@endphp
<div class="row">
    @foreach ($data as $x)
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-lg-12 col-6">
                            @if ($x->gambar == "")
                                <a href="no_Image.jpg" target="_blank">
                                    <img src="no_Image.jpg" alt="no_Image.jpg" style=" max-height: 150px;">
                                </a>
                            @else
                                <a href="uploads/gambar/{{ $x->gambar }}" target="_blank">
                                    <img src="uploads/gambar/{{ $x->gambar }}" alt="{{ $x->gambar }}" style=" max-height: 150px;">
                                </a>
                            @endif
                            <h5 class="mt-3">
                                <b>{{ $x->nama_produk }}</b>
                            </h5>
                            <p>
                                Rp. {{ number_format($x->harga,2,',','.') }}
                            </p>
                        </div>
                        <div class="col-lg-12 col-6">
                            <p style="
                                overflow: hidden;
                                display: -webkit-box;
                                -webkit-line-clamp: 6;
                                font-size:10px;
                                max-height:80px;
                                min-height:80px;
                                -webkit-box-orient: vertical;">
                                Deskripsi :
                                <br>
                                {{ $x->deskripsi_produk }}
                            </p>
                            <div class="row">
                                <div class="col-4">
                                    <button id="btn_min" onclick="minqty('text_qty','value_qty')" class="btn btn-sm btn-outline-muted p-0 m-0 px-1" style="float: right">
                                        <i data-feather="minus" width="9" height="9"></i>
                                    </button>
                                </div>
                                <div class="col-4">
                                    <p id="text_qty">0</p>
                                    <input type="number" class="d-none" name="qty" id="value_qty">
                                </div>
                                <div class="col-4">
                                    <button  id="btn_plus" onclick="addqty('text_qty','value_qty')" class="btn btn-sm btn-outline-muted p-0 m-0 px-1" style="float: left">
                                        <i data-feather="plus" width="9" height="9"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-primary mb-3" onclick="alert({{ $x->id }})">
                                Pilih <i class="ms-2" data-feather="shopping-cart" width="13" height="13"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row" style="float: right">
    @if ($data->lastPage() > 1)
        <ul class="pagination">
            <li class="page-item {{ ($data->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $data->url(1) }}" aria-label="Previous">
                    <i data-feather="arrow-left" width="13" height="13"></i>
                </a>
            </a>
            </li>
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                <li class="{{ ($data->currentPage() == $i) ? ' active' : '' }} page-item"><a class="page-link" href="{{ $data->url($i) }}">{{$i}}</a></li>
            @endfor
            <li class="{{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }} page-item">
                <a class="page-link" href="{{ $data->url($data->currentPage()+1) }}" aria-label="Next">
                    <i data-feather="arrow-right" width="13" height="13"></i>
                </a>
            </li>
        </ul>
    @else
        <div></div>
    @endif
</div>
@endsection
