<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Makanan - @yield('title')</title>
    <!-- Bootstrap 5 with Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --bs-body-bg: #0f0f12;
            --bs-body-color: #e0e0e0;
            --bs-primary-rgb: 88, 101, 242;
            --bs-secondary-rgb: 114, 118, 125;
            --bs-success-rgb: 87, 242, 135;
            --bs-info-rgb: 69, 202, 255;
            --bs-warning-rgb: 255, 186, 0;
            --bs-danger-rgb: 237, 66, 69;
            --bs-dark-rgb: 26, 27, 30;
            --bs-light-rgb: 227, 228, 232;
        }
        
        body {
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .card {
            background-color: #1a1b1e;
            border: 1px solid #2e2f33;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
        }
        
        .card-header {
            border-bottom: 1px solid #2e2f33;
            background-color: #1e1f23;
            padding: 1.25rem 1.5rem;
        }
        
        .table {
            color: var(--bs-body-color);
            margin-bottom: 0;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .table th {
            border-bottom: 2px solid #2e2f33;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.8rem;
            color: #a1a1a1;
        }
        
        .table td {
            border-top: 1px solid #2e2f33;
            vertical-align: middle;
            padding: 1rem;
        }
        
        .form-control, .form-select, .form-control:focus, .form-select:focus {
            background-color: #1e1f23;
            border: 1px solid #2e2f33;
            color: var(--bs-body-color);
            padding: 0.75rem 1rem;
        }
        
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(88, 101, 242, 0.25);
            border-color: #5865f2;
        }
        
        .btn {
            padding: 0.6rem 1.25rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        
        .btn-primary {
            background-color: rgb(var(--bs-primary-rgb));
            border-color: rgb(var(--bs-primary-rgb));
        }
        
        .btn-primary:hover {
            background-color: rgba(var(--bs-primary-rgb), 0.9);
            transform: translateY(-1px);
        }
        
        .btn-outline-primary {
            color: rgb(var(--bs-primary-rgb));
            border-color: rgb(var(--bs-primary-rgb));
        }
        
        .btn-outline-primary:hover {
            background-color: rgb(var(--bs-primary-rgb));
        }
        
        .alert {
            border-radius: 8px;
            border: none;
        }
        
        .pagination .page-item .page-link {
            background-color: #1e1f23;
            border: 1px solid #2e2f33;
            color: var(--bs-body-color);
        }
        
        .pagination .page-item.active .page-link {
            background-color: rgb(var(--bs-primary-rgb));
            border-color: rgb(var(--bs-primary-rgb));
        }
        
        .pagination .page-item.disabled .page-link {
            background-color: #1a1b1e;
            color: #6c757d;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #1a1b1e;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #5865f2;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #4752c4;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.4s ease forwards;
        }
        
        /* Glass morphism effect for navbar */
        .navbar {
            background: rgba(26, 27, 30, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        /* Gradient text */
        .text-gradient {
            background: linear-gradient(90deg, #5865f2, #eb459e);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="bi bi-egg-fried me-2 text-warning"></i>
                <span class="text-gradient fw-bold">FoodSar</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('makanans.index') }}">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('makanans.create') }}">
                            <i class="bi bi-plus-circle me-1"></i> Add Food
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container fade-in">
        @yield('content')
    </div>
    
    <!-- Footer -->
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth scrolling to all links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Add fade-in animation to alerts
        document.querySelectorAll('.alert').forEach(alert => {
            alert.classList.add('fade-in');
        });
    </script>
</body>
</html>