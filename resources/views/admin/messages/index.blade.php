@extends('layouts.app')

@section('title', 'Daftar Pesan')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5" style="color: #64ffda;">Daftar Pesan</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn" style="background-color: #ff6b6b; color: #112240; border: none; padding: 8px 16px;">
            <i class="fas fa-home me-2"></i>Kembali ke Dashboard
        </a>
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
                            <th style="color: #64ffda;">Status</th>
                            <th style="color: #64ffda;">Nama</th>
                            <th style="color: #64ffda;">Email</th>
                            <th style="color: #64ffda;">Subjek</th>
                            <th style="color: #64ffda;">Tanggal</th>
                            <th style="color: #64ffda;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                        <tr>
                            <td>
                                @if($message->status === 'unread')
                                <span class="badge rounded-pill" style="background-color: rgb(0, 255, 51); color: #112240; padding: 8px 12px;">
                                    <i class="fas fa-bell me-1"></i>Baru
                                </span>
                                @else
                                <span class="badge rounded-pill" style="background-color: #64ffda; color: #112240; padding: 8px 12px;">
                                    <i class="fas fa-check me-1"></i>Dibaca
                                </span>
                                @endif
                            </td>
                            <td style="color: #000000;">{{ $message->name }}</td>
                            <td style="color: #000000;">{{ $message->email }}</td>
                            <td style="color: #000000;">{{ $message->subject }}</td>
                            <td style="color: #000000;">{{ $message->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.messages.view', $message->id) }}" 
                                       class="btn" style="background-color: #ff6b6b; color: #112240; margin-right: 5px; border: none; padding: 8px 12px;">
                                        <i class="fas fa-eye" style="font-size: 1.1em;"></i> Lihat
                                    </a>
                                    <form action="{{ route('admin.messages.delete', $message->id) }}" 
                                          method="POST" class="d-inline" id="deleteForm{{ $message->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn" 
                                                style="background-color: #ff6b6b; color: #112240; border: none; padding: 8px 12px;"
                                                onclick="confirmDelete({{ $message->id }})">
                                            <i class="fas fa-trash" style="font-size: 1.1em;"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center" style="color: #ccd6f6;">Tidak ada pesan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Script untuk konfirmasi hapus -->
<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus pesan ini? Tindakan ini tidak dapat dibatalkan.')) {
        document.getElementById('deleteForm' + id).submit();
    }
}
</script>
@endsection 