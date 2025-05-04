@extends('layouts.app')

@section('title', 'Daftar Makanan')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-light">🍽️ Daftar Menu Makanan</h2>
                <a href="{{ route('makanans.create') }}" class="btn btn-outline-light btn-sm shadow-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Makanan
                </a>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show bg-success bg-opacity-25 border-0 text-light" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ $message }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card bg-dark border-secondary shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle mb-0">
                            <thead>
                                <tr class="text-secondary">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th class="text-center" width="180px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($makanans as $makanan)
                                <tr>
                                    <td class="text-light">{{ ++$i }}</td>
                                    <td class="fw-semibold text-light">{{ $makanan->nama }}</td>
                                    <td class="text-light">{{ Str::limit($makanan->deskripsi, 50) }}</td>
                                    <td class="text-light">Rp {{ number_format($makanan->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge bg-secondary text-light">{{ $makanan->kategori }}</span>
                                    </td>
                                    <td class="text-center">
    <div class="d-flex justify-content-center gap-2">
        <a href="{{ route('makanans.show', $makanan->id) }}" class="btn btn-sm btn-outline-info" title="Lihat">
            <i class="fas fa-eye">detail</i>
        </a>
        <a href="{{ route('makanans.edit', $makanan->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
            <i class="fas fa-edit">edit</i>
        </a>
        <form action="{{ route('makanans.destroy', $makanan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                <i class="fas fa-trash">delete</i>
            </button>
        </form>
    </div>
</td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="fas fa-utensils fa-2x mb-3 text-secondary"></i>
                                        <p>Belum ada makanan ditambahkan</p>
                                        <a href="{{ route('makanans.create') }}" class="btn btn-outline-light btn-sm">
                                            <i class="fas fa-plus me-1"></i> Tambah Sekarang
                                        </a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 text-secondary">
                        <div>
                            Menampilkan {{ $makanans->firstItem() }} sampai {{ $makanans->lastItem() }} dari {{ $makanans->total() }} item
                        </div>
                        <div>
                            {!! $makanans->withQueryString()->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
@endpush
