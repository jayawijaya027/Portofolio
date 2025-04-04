<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Portfolio Saya</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #0a192f;
            color: #ffffff;
            position: relative;
            overflow-x: hidden;
        }

        /* Memastikan semua teks memiliki warna yang jelas */
        * {
            color: #ffffff;
        }

        /* Override untuk elemen-elemen Bootstrap */
        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff !important;
        }

        .navbar-dark .navbar-brand {
            color: #64ffda !important;
        }

        .navbar-dark .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar-dark .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown-menu {
            background-color: #112240;
            border-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown-item {
            color: #ffffff;
        }

        .dropdown-item:hover {
            background-color: rgba(100, 255, 218, 0.1);
            color: #64ffda;
        }

        .neon-bg {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
            background-color: #0a192f;
        }

        .neon-circle {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.05;
            animation: float 15s infinite ease-in-out;
        }

        .neon-1 {
            width: 300px;
            height: 300px;
            background: #ff00ff;
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .neon-2 {
            width: 250px;
            height: 250px;
            background: #00ffff;
            top: 50%;
            right: -100px;
            animation-delay: -5s;
        }

        .neon-3 {
            width: 200px;
            height: 200px;
            background: #ff00aa;
            bottom: -50px;
            left: 50%;
            animation-delay: -10s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(50px, 50px); }
            50% { transform: translate(0, 100px); }
            75% { transform: translate(-50px, 50px); }
        }

        .navbar {
            margin-bottom: 20px;
            background-color: #0a192f !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .navbar-brand {
            color: #64ffda !important;
            font-weight: bold;
            text-shadow: 0 0 10px rgba(100, 255, 218, 0.2);
        }

        .nav-link {
            color: #ffffff !important;
            position: relative;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #64ffda !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #64ffda;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .footer {
            background-color: #0a192f;
            padding: 20px 0;
            margin-top: 50px;
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer p, .footer a, .footer span {
            color: #ffffff !important;
            font-weight: 400;
        }

        .footer a {
            color: #64ffda !important;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer a:hover {
            color: #4cd8b2 !important;
            text-decoration: underline;
        }

        .content {
            min-height: calc(100vh - 200px);
            padding: 20px 0;
            position: relative;
            z-index: 1;
            background-color: #0a192f;
        }

        .card {
            background-color: #112240;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            color: #ffffff;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border-color: rgba(100, 255, 218, 0.2);
        }

        .card-title {
            color: #64ffda;
            font-weight: 600;
        }

        .card-text {
            color: #ffffff;
            font-weight: 400;
        }

        .btn-primary {
            background-color: #64ffda;
            border-color: #64ffda;
            color: #0a192f;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4cd8b2;
            border-color: #4cd8b2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(100, 255, 218, 0.2);
        }

        h1, h2, h3, h4, h5, h6 {
            color: #64ffda;
            font-weight: 600;
        }

        p {
            color: #ffffff;
            font-weight: 400;
        }

        .section-title {
            color: #64ffda;
            font-size: 1.8rem;
            font-weight: 600;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background-color: #64ffda;
        }

        .lead {
            color: #ffffff;
            font-weight: 400;
        }

        ul {
            color: #ffffff;
        }

        li {
            color: #ffffff;
        }

        /* Tambahan untuk memastikan semua teks terlihat */
        .text-muted {
            color: #8892b0 !important;
        }

        .form-control {
            background-color: #1a2b4a !important;
            border-color: #1a2b4a !important;
            color: #ffffff !important;
        }

        .form-control:focus {
            background-color: #1a2b4a !important;
            border-color: #64ffda !important;
            color: #ffffff !important;
            box-shadow: 0 0 0 0.25rem rgba(100, 255, 218, 0.25) !important;
        }

        .form-label {
            color: #64ffda !important;
        }

        .input-group-text {
            background-color: #1a2b4a !important;
            border-color: #1a2b4a !important;
        }

        .input-group-text i {
            color: #64ffda !important;
        }

        .table {
            color: #ffffff !important;
        }

        .table thead th {
            color: #64ffda !important;
            border-bottom-color: #1a2b4a !important;
        }

        .table tbody td {
            border-color: #1a2b4a !important;
        }

        .alert {
            background-color: #112240;
            border-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .alert-success {
            border-color: #64ffda;
        }

        .alert-danger {
            border-color: #ff6b6b;
        }

        .badge {
            background-color: #64ffda !important;
            color: #0a192f !important;
        }

        /* Tambahan untuk memastikan teks di dalam modal terlihat */
        .modal-content {
            background-color: #112240;
            border-color: rgba(255, 255, 255, 0.1);
        }

        .modal-header {
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        .modal-footer {
            border-top-color: rgba(255, 255, 255, 0.1);
        }

        .modal-title {
            color: #64ffda;
        }

        /* Tambahan untuk memastikan teks di dalam pagination terlihat */
        .pagination .page-link {
            background-color: #112240;
            border-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .pagination .page-link:hover {
            background-color: rgba(100, 255, 218, 0.1);
            border-color: #64ffda;
            color: #64ffda;
        }

        .pagination .page-item.active .page-link {
            background-color: #64ffda;
            border-color: #64ffda;
            color: #0a192f;
        }

        /* Tambahan untuk memastikan teks di dalam tooltip terlihat */
        .tooltip-inner {
            background-color: #112240;
            color: #ffffff;
        }

        .bs-tooltip-top .arrow::before {
            border-top-color: #112240;
        }

        /* Tambahan untuk memastikan teks di dalam popover terlihat */
        .popover {
            background-color: #112240;
            border-color: rgba(255, 255, 255, 0.1);
        }

        .popover-header {
            background-color: #0a192f;
            border-bottom-color: rgba(255, 255, 255, 0.1);
            color: #64ffda;
        }

        .popover-body {
            color: #ffffff;
        }

        .bs-popover-top .arrow::before {
            border-top-color: #112240;
        }

        /* Card Styles */
        .card {
            background-color: #112240 !important;
            border: none !important;
        }
        
        .card-title {
            color: #64ffda !important;
        }
        
        .card-text {
            color: #ffffff !important;
        }
        
        /* Button Styles */
        .btn-primary {
            background-color: #64ffda !important;
            border-color: #64ffda !important;
            color: #0a192f !important;
        }
        
        .btn-primary:hover {
            background-color: #4cd8b2 !important;
            border-color: #4cd8b2 !important;
        }
        
        .btn-outline-primary {
            color: #64ffda !important;
            border-color: #64ffda !important;
        }
        
        .btn-outline-primary:hover {
            background-color: #64ffda !important;
            border-color: #64ffda !important;
            color: #0a192f !important;
        }
        
        /* Text Colors */
        .text-muted {
            color: #8892b0 !important;
        }
        
        /* List Styles */
        .list-unstyled li {
            color: #ffffff !important;
        }
        
        /* Icon Colors */
        .fas, .fab {
            color: #64ffda !important;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <!-- Neon Background -->
    <div class="neon-bg">
        <div class="neon-circle neon-1"></div>
        <div class="neon-circle neon-2"></div>
        <div class="neon-circle neon-3"></div>
    </div>

    <!-- Content -->
    <main class="content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 