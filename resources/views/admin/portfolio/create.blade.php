@extends('layouts.app')

@section('title', 'Tambah Portfolio')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1 class="display-4 mb-4">Tambah Portfolio Baru</h1>
        
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label" style="color: #64ffda;">Judul Proyek</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label" style="color: #64ffda;">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" style="color: #64ffda;">Teknologi yang Digunakan</label>
                        
                        <div class="mb-3">
                            <label for="programming_language" class="form-label">Bahasa Pemrograman</label>
                            <input type="text" class="form-control @error('programming_language') is-invalid @enderror" 
                                   id="programming_language" name="programming_language" value="{{ old('programming_language') }}" required>
                            <small class="text-muted">Contoh: PHP, JavaScript, Python</small>
                            @error('programming_language')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="database" class="form-label">Database</label>
                            <input type="text" class="form-control @error('database') is-invalid @enderror" 
                                   id="database" name="database" value="{{ old('database') }}" required>
                            <small class="text-muted">Contoh: MySQL, PostgreSQL, MongoDB</small>
                            @error('database')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="frontend" class="form-label">Front-end</label>
                            <input type="text" class="form-control @error('frontend') is-invalid @enderror" 
                                   id="frontend" name="frontend" value="{{ old('frontend') }}" required>
                            <small class="text-muted">Contoh: HTML, CSS, Bootstrap, React</small>
                            @error('frontend')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="backend" class="form-label">Back-end</label>
                            <input type="text" class="form-control @error('backend') is-invalid @enderror" 
                                   id="backend" name="backend" value="{{ old('backend') }}" required>
                            <small class="text-muted">Contoh: Laravel, Node.js, Express.js</small>
                            @error('backend')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="additional_features" class="form-label">Fitur Tambahan</label>
                            <input type="text" class="form-control @error('additional_features') is-invalid @enderror" 
                                   id="additional_features" name="additional_features" value="{{ old('additional_features') }}">
                            <small class="text-muted">Contoh: API Integration, Payment Gateway, Authentication</small>
                            @error('additional_features')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="github_url" class="form-label" style="color: #64ffda;">Link GitHub</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fab fa-github"></i>
                            </span>
                            <input type="url" class="form-control @error('github_url') is-invalid @enderror" 
                                   id="github_url" name="github_url" value="{{ old('github_url') }}" 
                                   placeholder="https://github.com/username/project">
                        </div>
                        <small class="text-muted">Opsional - Masukkan URL repository GitHub</small>
                        @error('github_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="demo_url" class="form-label" style="color: #64ffda;">Link Demo</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-external-link-alt"></i>
                            </span>
                            <input type="url" class="form-control @error('demo_url') is-invalid @enderror" 
                                   id="demo_url" name="demo_url" value="{{ old('demo_url') }}" 
                                   placeholder="https://demo-project.com">
                        </div>
                        <small class="text-muted">Opsional - Masukkan URL demo proyek</small>
                        @error('demo_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label" style="color: #64ffda;">Gambar Proyek</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*" required>
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.portfolio') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn" style="background-color: #ff6b6b; color: #112240; border: none;">
                            <i class="fas fa-save me-2"></i>Simpan Portfolio
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