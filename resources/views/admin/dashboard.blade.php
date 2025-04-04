@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-4">
    <h1 class="display-5 mb-4" style="color: #64ffda;">Dashboard Admin</h1>

    <div class="row g-4">
        <!-- Portfolio Card -->
        <div class="col-md-6">
            <div class="card h-100" style="background-color: #112240; border: 1px solid #1e3a8a;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title" style="color: #64ffda;">
                            <i class="fas fa-folder-open me-2"></i>Portfolio
                        </h5>
                        <a href="{{ route('admin.portfolio') }}" class="btn" 
                           style="background-color: #ff6b6b; color: #112240; padding: 8px 16px; border: none;">
                            Lihat Semua <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <h3 class="mb-0" style="color: #64ffda;">{{ $totalPortfolio }}</h3>
                            <small style="color: #ccd6f6;">Total Proyek</small>
                        </div>
                        <div class="col border-start">
                            <h3 class="mb-0" style="color: #64ffda;">{{ $recentPortfolio }}</h3>
                            <small style="color: #ccd6f6;">Proyek Baru</small>
                        </div>
                    </div>
                    @if($latestPortfolios->count() > 0)
                    <hr class="my-3" style="border-color: #1e3a8a;">
                    <h6 class="mb-3" style="color: #64ffda;">Proyek Terbaru</h6>
                    <div class="list-group list-group-flush">
                        @foreach($latestPortfolios as $portfolio)
                        <div class="list-group-item" style="background-color: transparent; border-color: #1e3a8a;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1" style="color: #ccd6f6;">{{ $portfolio->title }}</h6>
                                    <small style="color: #8892b0;">{{ $portfolio->created_at->format('d M Y') }}</small>
                                </div>
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
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Messages Card -->
        <div class="col-md-6">
            <div class="card h-100" style="background-color: #112240; border: 1px solid #1e3a8a;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title" style="color: #64ffda;">
                            <i class="fas fa-envelope me-2"></i>Pesan Masuk
                        </h5>
                        <a href="{{ route('admin.messages') }}" class="btn" 
                           style="background-color: #ff6b6b; color: #112240; padding: 8px 16px; border: none;">
                            Lihat Semua <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <h3 class="mb-0" style="color: #64ffda;">{{ $totalMessages }}</h3>
                            <small style="color: #ccd6f6;">Total Pesan</small>
                        </div>
                        <div class="col border-start">
                            <h3 class="mb-0" style="color: #64ffda;">{{ $unreadMessages }}</h3>
                            <small style="color: #ccd6f6;">Belum Dibaca</small>
                        </div>
                    </div>
                    @if($latestMessages->count() > 0)
                    <hr class="my-3" style="border-color: #1e3a8a;">
                    <h6 class="mb-3" style="color: #64ffda;">Pesan Terbaru</h6>
                    <div class="list-group list-group-flush">
                        @foreach($latestMessages as $message)
                        <div class="list-group-item" style="background-color: transparent; border-color: #1e3a8a;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1" style="color: #ccd6f6;">{{ $message->name }}</h6>
                                    <small style="color: #8892b0;">{{ $message->subject }}</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    @if($message->status === 'unread')
                                    <span class="badge rounded-pill" style="background-color:rgb(0, 255, 51); color: #112240; padding: 8px 12px;">
                                        <i class="fas fa-bell me-1"></i>Baru
                                    </span>
                                    @endif
                                    <a href="{{ route('admin.messages.view', $message->id) }}" 
                                       class="btn ms-2" style="background-color: #ff6b6b; color: #112240; border: none; padding: 8px 12px;">
                                        <i class="fas fa-eye" style="font-size: 1.1em;"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
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