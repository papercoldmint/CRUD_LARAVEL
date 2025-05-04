@extends('layouts.app')

@section('title', 'Edit Makanan')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Makanan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('makanans.update', $makanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Makanan</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $makanan->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $makanan->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="{{ $makanan->harga }}" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="Makanan Berat" {{ $makanan->kategori == 'Makanan Berat' ? 'selected' : '' }}>Makanan Berat</option>
                                <option value="Makanan Ringan" {{ $makanan->kategori == 'Makanan Ringan' ? 'selected' : '' }}>Makanan Ringan</option>
                                <option value="Minuman" {{ $makanan->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                                <option value="Dessert" {{ $makanan->kategori == 'Dessert' ? 'selected' : '' }}>Dessert</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('makanans.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection