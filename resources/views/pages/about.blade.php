@extends('layouts.app')

@section('title', 'Tentang Saya')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4 mb-4 text-center" style="color: #64ffda;">Tentang Saya</h1>
            
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4" style="color: #64ffda;">
                        <i class="fas fa-user-circle me-2"></i>Profil
                    </h5>
                    <p class="lead mb-4">Saya adalah seorang programmer amatir yang memiliki semangat tinggi dalam pengembangan web. Dengan pengalaman dalam Laravel dan berbagai teknologi web modern, saya terus belajar dan berkembang dalam dunia pemrograman.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-graduation-cap me-3" style="color: #64ffda; font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-1" style="color: #64ffda;">Pendidikan</h6>
                                    <p class="mb-0">Universitas Islam Nahdlatul Ulama</p>
                                    <small>Teknik Informatika</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt me-3" style="color: #64ffda; font-size: 1.5rem;"></i>
                                <div>
                                    <h6 class="mb-1" style="color: #64ffda;">Lokasi</h6>
                                    <p class="mb-0">Jepara, Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4" style="color: #64ffda;">
                        <i class="fas fa-graduation-cap me-2"></i>Pendidikan
                    </h5>
                    <div class="timeline">
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <div class="bg-primary rounded-circle p-3" style="background-color: #64ffda !important;">
                                    <i class="fas fa-university text-dark"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Universitas Islam Nahdlatul Ulama</h6>
                                <p class="mb-1">Teknik Informatika</p>
                                <small class="text-muted">2023 - Sekarang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4" style="color: #64ffda;">
                        <i class="fas fa-code me-2"></i>Keahlian
                    </h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card h-100" style="background-color: #112240;">
                                <div class="card-body">
                                    <h6 class="card-title mb-3" style="color: #64ffda;">
                                        <i class="fas fa-laptop-code me-2"></i>Frontend
                                    </h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle me-2" style="color: #64ffda;"></i>HTML5 & CSS3
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle me-2" style="color: #64ffda;"></i>JavaScript
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle me-2" style="color: #64ffda;"></i>Bootstrap
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle me-2" style="color: #64ffda;"></i>Responsive Design
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100" style="background-color: #112240;">
                                <div class="card-body">
                                    <h6 class="card-title mb-3" style="color: #64ffda;">
                                        <i class="fas fa-server me-2"></i>Backend
                                    </h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle me-2" style="color: #64ffda;"></i>PHP
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle me-2" style="color: #64ffda;"></i>Laravel
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle me-2" style="color: #64ffda;"></i>MySQL
                                        </li>
                                        <li>
                                            <i class="fas fa-check-circle me-2" style="color: #64ffda;"></i>RESTful API
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection 