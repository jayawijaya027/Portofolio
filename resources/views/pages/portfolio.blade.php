@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4 mb-4 text-center" style="color: #64ffda;">Portfolio Saya</h1>
            <p class="lead text-center mb-5">Berikut adalah beberapa proyek yang telah saya kerjakan</p>

            <div class="row g-4">
                @foreach($portfolios as $portfolio)
                <div class="col-md-6">
                    <div class="card h-100" style="background-color: #112240;">
                        <div class="position-relative">
                            <img src="{{ asset('storage/portfolio/' . $portfolio->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $portfolio->title }}"
                                 style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $portfolio->title }}</h5>
                            <p class="card-text mb-3">{{ $portfolio->description }}</p>
                            <div class="mb-3">
                                <h6 style="color: #64ffda; font-size: 0.95rem; margin-bottom: 0.8rem;">Teknologi yang Digunakan:</h6>
                                <div class="tech-list" style="font-size: 0.9rem;">
                                    <div class="tech-item mb-2">
                                        <span style="display: inline-block; width: 95px; color: #ccd6f6; padding-right: 5px;">Bahasa</span>
                                        <span style="color: #64ffda; font-weight: 500;">{{ $portfolio->programming_language }}</span>
                                    </div>
                                    <div class="tech-item mb-2">
                                        <span style="display: inline-block; width: 95px; color: #ccd6f6; padding-right: 5px;">Database</span>
                                        <span style="color: #64ffda; font-weight: 500;">{{ $portfolio->database }}</span>
                                    </div>
                                    <div class="tech-item mb-2">
                                        <span style="display: inline-block; width: 95px; color: #ccd6f6; padding-right: 5px;">Front-end</span>
                                        <span style="color: #64ffda; font-weight: 500;">{{ $portfolio->frontend }}</span>
                                    </div>
                                    <div class="tech-item mb-2">
                                        <span style="display: inline-block; width: 95px; color: #ccd6f6; padding-right: 5px;">Back-end</span>
                                        <span style="color: #64ffda; font-weight: 500;">{{ $portfolio->backend }}</span>
                                    </div>
                                    @if($portfolio->additional_features)
                                    <div class="tech-item mb-2">
                                        <span style="display: inline-block; width: 95px; color: #ccd6f6; padding-right: 5px;">Fitur</span>
                                        <span style="color: #64ffda; font-weight: 500;">{{ $portfolio->additional_features }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        @if($portfolio->github_url)
                                        <a href="{{ $portfolio->github_url }}" 
                                           class="btn btn-sm"
                                           style="background-color: transparent; border: 1px solid #64ffda; color: #64ffda; transition: all 0.3s ease;"
                                           onmouseover="this.style.backgroundColor='#64ffda'; this.style.color='#112240';"
                                           onmouseout="this.style.backgroundColor='transparent'; this.style.color='#64ffda';"
                                           target="_blank">
                                            <i class="fab fa-github me-1"></i>GitHub
                                        </a>
                                        @endif
                                        @if($portfolio->demo_url)
                                        <a href="{{ $portfolio->demo_url }}" 
                                           class="btn btn-sm"
                                           style="background-color: transparent; border: 1px solid #64ffda; color: #64ffda; transition: all 0.3s ease;"
                                           onmouseover="this.style.backgroundColor='#64ffda'; this.style.color='#112240';"
                                           onmouseout="this.style.backgroundColor='transparent'; this.style.color='#64ffda';"
                                           target="_blank">
                                            <i class="fas fa-external-link-alt me-1"></i>Demo
                                        </a>
                                        @endif
                                    </div>
                                    <small style="color: #8892b0;">{{ $portfolio->created_at->format('d M Y') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($portfolios->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-folder-open mb-3" style="font-size: 3rem; color: #64ffda;"></i>
                <h5 class="mb-3">Belum Ada Portfolio</h5>
                <p class="text-muted">Portfolio akan segera ditambahkan</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection 