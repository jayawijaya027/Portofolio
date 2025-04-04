@extends('layouts.app')

@section('title', 'Detail Pesan')

@section('content')
<div class="container py-4">
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

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-5" style="color: #64ffda;">Detail Pesan</h1>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn me-2" style="background-color: #ff6b6b; color: #112240; border: none;">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
            <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" class="d-inline" id="deleteForm">
                @csrf
                @method('DELETE')
                <button type="button" class="btn" style="background-color: #ff6b6b; color: #112240; border: none;"
                        onclick="confirmDelete()">
                    <i class="fas fa-trash me-2"></i>Hapus Pesan
                </button>
            </form>
        </div>
    </div>

    <div class="card" style="background-color: #112240; border: 1px solid #1e3a8a;">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 style="color: #64ffda;">Informasi Pengirim</h5>
                    <p class="mb-1" style="color: #ccd6f6;">Nama: {{ $message->name }}</p>
                    <p class="mb-1" style="color: #ccd6f6;">Email: {{ $message->email }}</p>
                    <p class="mb-1" style="color: #ccd6f6;">Tanggal: {{ $message->created_at->format('d M Y H:i') }}</p>
                </div>
                <div class="col-md-6">
                    <h5 style="color: #64ffda;">Status</h5>
                    @if($message->status === 'unread')
                    <form action="{{ route('admin.messages.read', $message->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm" style="background-color: #64ffda; color: #112240; border: none;">
                            <i class="fas fa-check me-2"></i>Tandai sebagai Dibaca
                        </button>
                    </form>
                    @else
                    <p class="mb-0" style="color: #ccd6f6;">
                        <i class="fas fa-check-circle me-2"></i>Pesan telah dibaca
                    </p>
                    @endif
                </div>
            </div>

            <div>
                <h5 style="color: #64ffda;">Subjek</h5>
                <p class="mb-3" style="color: #ccd6f6;">{{ $message->subject }}</p>

                <h5 style="color: #64ffda;">Pesan</h5>
                <div class="p-3 rounded" style="background-color: #1e3a8a; color: #ccd6f6;">
                    {!! nl2br(e($message->message)) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Script untuk konfirmasi hapus -->
<script>
function confirmDelete() {
    if (confirm('Apakah Anda yakin ingin menghapus pesan ini? Tindakan ini tidak dapat dibatalkan.')) {
        document.getElementById('deleteForm').submit();
    }
}
</script>
@endsection 