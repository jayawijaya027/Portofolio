@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="display-4 mb-4">Hubungi Saya</h1>
        
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

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title mb-4">Informasi Kontak</h5>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-envelope me-3" style="color: #64ffda; font-size: 1.5rem;"></i>
                            <div>
                                <h6 class="mb-1" style="color: #64ffda;">Email</h6>
                                <p class="mb-0">triteguhjaya@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-phone me-3" style="color: #64ffda; font-size: 1.5rem;"></i>
                            <div>
                                <h6 class="mb-1" style="color: #64ffda;">Telepon</h6>
                                <p class="mb-0">+62 895 3234 49220</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt me-3" style="color: #64ffda; font-size: 1.5rem;"></i>
                            <div>
                                <h6 class="mb-1" style="color: #64ffda;">Alamat</h6>
                                <p class="mb-0">Jl. Ngasem Sukodono, Jepara, Indonesia</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-3" style="color: #64ffda;">Media Sosial</h6>
                        <div class="d-flex flex-column">
                            <a href="https://www.facebook.com/share/1AFcfLjw5v/?mibextid=wwXIfr" 
                               class="text-decoration-none mb-3 d-flex align-items-center" 
                               style="color: #ffffff; transition: all 0.3s ease;">
                                <i class="fab fa-facebook me-3" style="color: #64ffda; font-size: 1.5rem;"></i>
                                <span>Facebook</span>
                            </a>
                            <a href="https://www.instagram.com/teguhthree_?igsh=cmUxcXlzYXRvZWkw&utm_source=qr" 
                               class="text-decoration-none mb-3 d-flex align-items-center" 
                               style="color: #ffffff; transition: all 0.3s ease;">
                                <i class="fab fa-instagram me-3" style="color: #64ffda; font-size: 1.5rem;"></i>
                                <span>Instagram</span>
                            </a>
                            <a href="https://github.com/jayawijaya027" 
                               class="text-decoration-none d-flex align-items-center" 
                               style="color: #ffffff; transition: all 0.3s ease;">
                                <i class="fab fa-github me-3" style="color: #64ffda; font-size: 1.5rem;"></i>
                                <span>GitHub</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Formulir Kontak</h5>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label" style="color: #64ffda;">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       name="name" 
                                       placeholder="Masukkan nama lengkap Anda" 
                                       value="{{ old('name') }}" 
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label" style="color: #64ffda;">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       placeholder="Masukkan email Anda" 
                                       value="{{ old('email') }}" 
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label" style="color: #64ffda;">Subjek</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-tag"></i>
                            </span>
                            <input type="text" 
                                   class="form-control @error('subject') is-invalid @enderror" 
                                   name="subject" 
                                   placeholder="Masukkan subjek pesan" 
                                   value="{{ old('subject') }}" 
                                   required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label" style="color: #64ffda;">Pesan</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-comment"></i>
                            </span>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      name="message" 
                                      rows="5" 
                                      placeholder="Tulis pesan Anda di sini" 
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="fas fa-paper-plane me-2"></i>Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection 