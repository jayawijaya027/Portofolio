@extends('layouts.app')

@section('title', 'Kelola Portfolio')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5" style="color: #64ffda;">Kelola Portfolio</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn me-2" style="background-color: #ff6b6b; color: #112240; border: none; padding: 8px 16px;">
                <i class="fas fa-home me-2"></i>Kembali ke Dashboard
            </a>
            <a href="{{ route('admin.portfolio.create') }}" class="btn" style="background-color: #ff6b6b; color: #112240; border: none; padding: 8px 16px;">
                <i class="fas fa-plus-circle me-2"></i>Tambah Portfolio
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card" style="background-color: #112240; border: 1px solid #1e3a8a;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="color: #64ffda;">Gambar</th>
                            <th style="color: #64ffda;">Judul</th>
                            <th style="color: #64ffda;">Bahasa Pemrograman</th>
                            <th style="color: #64ffda;">Database</th>
                            <th style="color: #64ffda;">Frontend</th>
                            <th style="color: #64ffda;">Backend</th>
                            <th style="color: #64ffda;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($portfolios as $portfolio)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/portfolio/' . $portfolio->image) }}" 
                                     alt="{{ $portfolio->title }}" 
                                     style="width: 50px; height: 50px; object-fit: cover;">
                            </td>
                            <td style="color: #000000;">{{ $portfolio->title }}</td>
                            <td style="color: #000000;">{{ $portfolio->programming_language }}</td>
                            <td style="color: #000000;">{{ $portfolio->database }}</td>
                            <td style="color: #000000;">{{ $portfolio->frontend }}</td>
                            <td style="color: #000000;">{{ $portfolio->backend }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" 
                                       class="btn" style="background-color: #ff6b6b; color: #112240; margin-right: 5px; border: none; padding: 8px 12px;">
                                        <i class="fas fa-edit" style="font-size: 1.1em;"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.portfolio.delete', $portfolio->id) }}" 
                                          method="POST" class="d-inline" id="deleteForm{{ $portfolio->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn" 
                                                style="background-color: #ff6b6b; color: #112240; border: none; padding: 8px 12px;"
                                                onclick="confirmDelete({{ $portfolio->id }})">
                                            <i class="fas fa-trash" style="font-size: 1.1em;"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center" style="color: #ccd6f6;">Tidak ada portfolio</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $portfolios->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Script untuk konfirmasi hapus -->
<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus portfolio ini? Tindakan ini tidak dapat dibatalkan.')) {
        document.getElementById('deleteForm' + id).submit();
    }
}
</script>
@endsection 