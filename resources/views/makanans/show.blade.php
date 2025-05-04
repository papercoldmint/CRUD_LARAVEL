@extends('layouts.app')

@section('title', 'Detail Makanan')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Makanan</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Makanan</label>
                        <p class="form-control-static">{{ $makanan->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <p class="form-control-static">{{ $makanan->deskripsi }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <p class="form-control-static">Rp {{ number_format($makanan->harga, 0, ',', '.') }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <p class="form-control-static">{{ $makanan->kategori }}</p>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('makanans.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection