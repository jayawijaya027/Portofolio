@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="position-relative">
                <h1 class="display-4 fw-bold mb-4" style="color: #64ffda;">Selamat Datang di Portfolio Saya</h1>
                <p class="lead mb-4">Saya adalah seorang programmer amatir yang bersemangat dalam pengembangan web.</p>
                <hr class="my-4" style="border-color: rgba(255, 255, 255, 0.1);">
                <div class="mb-4">
                    <h5 class="mb-3" style="color: #64ffda;">Minat & Keahlian</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-code me-2" style="color: #64ffda;"></i>
                                <span>Pengembangan Web dengan Laravel</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-paint-brush me-2" style="color: #64ffda;"></i>
                                <span>Frontend Development</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-pencil-ruler me-2" style="color: #64ffda;"></i>
                                <span>UI/UX Design</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-database me-2" style="color: #64ffda;"></i>
                                <span>Database Management</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="/portfolio" class="btn btn-primary me-3">
                        <i class="fas fa-briefcase me-2"></i>Lihat Portfolio
                    </a>
                    <a href="/kontak" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i>Hubungi Saya
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="position-relative">
                <div class="card border-0" style="background: transparent;">
                    <div class="card-body p-0">
                        <img src="{{ asset('storage/profile/231240001427.jpg') }}" 
                             alt="Profile Image" 
                             class="img-fluid rounded-3 shadow-lg"
                             style="max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="position-absolute top-0 end-0 mt-3 me-3">
                    <div class="bg-primary rounded-circle p-3" style="background-color: #64ffda !important;">
                        <i class="fas fa-code text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection 