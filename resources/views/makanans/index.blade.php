@extends('layouts.app')

@section('title', 'Daftar Makanan')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Daftar Makanan</h2>
                <a href="{{ route('makanans.create') }}" class="btn btn-primary">Tambah Makanan</a>
            </div>
            
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th width="180px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($makanans as $makanan)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $makanan->nama }}</td>
                                    <td>{{ Str::limit($makanan->deskripsi, 50) }}</td>
                                    <td>Rp {{ number_format($makanan->harga, 0, ',', '.') }}</td>
                                    <td>{{ $makanan->kategori }}</td>
                                    <td>
                                        <form action="{{ route('makanans.destroy', $makanan->id) }}" method="POST">
                                            <a class="btn btn-sm btn-info" href="{{ route('makanans.show', $makanan->id) }}">Show</a>
                                            <a class="btn btn-sm btn-warning" href="{{ route('makanans.edit', $makanan->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-3">
                        {!! $makanans->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection