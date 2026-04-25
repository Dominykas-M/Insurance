<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Insurance') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:400,500,600,700" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background-color: #f0f2f5; }

        .navbar {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%) !important;
            border-bottom: none !important;
            padding: 0.8rem 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        .navbar-brand {
            color: #e94560 !important;
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: 1px;
        }
        .nav-link { color: rgba(255,255,255,0.8) !important; font-weight: 500; }
        .nav-link:hover { color: #e94560 !important; }
        .dropdown-menu {
            background: #1a1a2e;
            border: 1px solid #0f3460;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
        }
        .dropdown-item { color: rgba(255,255,255,0.8) !important; }
        .dropdown-item:hover { background: #0f3460 !important; color: #e94560 !important; }

        .card {
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08) !important;
        }
        .card-header {
            background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 100%) !important;
            border-radius: 16px 16px 0 0 !important;
            color: white !important;
            font-weight: 600;
            padding: 1.2rem 1.5rem;
            border-bottom: none !important;
        }
        .btn-primary {
            background: linear-gradient(135deg, #e94560, #c23152) !important;
            border: none !important;
            border-radius: 8px !important;
            font-weight: 600;
            padding: 0.5rem 1.2rem;
            box-shadow: 0 4px 12px rgba(233,69,96,0.3);
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(233,69,96,0.4) !important;
        }
        .btn-warning {
            background: linear-gradient(135deg, #f7b731, #f0a500) !important;
            border: none !important;
            border-radius: 8px !important;
            font-weight: 600;
            color: white !important;
        }
        .btn-danger {
            background: linear-gradient(135deg, #e74c3c, #c0392b) !important;
            border: none !important;
            border-radius: 8px !important;
            font-weight: 600;
        }
        .btn-secondary {
            background: linear-gradient(135deg, #636e72, #2d3436) !important;
            border: none !important;
            border-radius: 8px !important;
            font-weight: 600;
            color: white !important;
        }
        .table {
            border-radius: 12px;
            overflow: hidden;
        }
        .table thead th {
            background: #1a1a2e;
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem 1.2rem;
        }
        .table tbody tr {
            transition: all 0.2s;
        }
        .table tbody tr:hover {
            background: #f8f9ff;
            transform: scale(1.001);
        }
        .table tbody td {
            padding: 1rem 1.2rem;
            vertical-align: middle;
            border-color: #f0f2f5;
        }
        .form-control {
            border-radius: 8px !important;
            border: 2px solid #e0e0e0 !important;
            padding: 0.6rem 1rem;
            transition: all 0.2s;
        }
        .form-control:focus {
            border-color: #e94560 !important;
            box-shadow: 0 0 0 3px rgba(233,69,96,0.1) !important;
        }
        .alert-success {
            background: linear-gradient(135deg, #00b894, #00cec9) !important;
            border: none !important;
            border-radius: 12px !important;
            color: white !important;
            font-weight: 500;
        }
        .container { max-width: 1100px; }
        h1 { font-weight: 700; color: #1a1a2e; margin-bottom: 1.5rem; }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                🚗 {{ config('app.name', 'Insurance') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('owners.index') }}">Owners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cars.index') }}">Cars</a>
                        </li>
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                👤 {{ Auth::user()->name }}
                                <span style="font-size:0.7rem; background:#e94560; padding:2px 8px; border-radius:20px; margin-left:5px;">
                                        {{ Auth::user()->role }}
                                    </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
