<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Student Records')</title>

    <!-- Fonts, Bootstrap, Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
    :root {
        --brand: #16a34a;
        --brand-dark: #15803d;
        --brand-soft: #f0fdf4;
        --brand-rgb: 22, 163, 74;
        --bg: #f6fbf7;

        /* Make Bootstrap's "primary" green everywhere */
        --bs-primary: #16a34a;
        --bs-primary-rgb: 22, 163, 74;
        --bs-link-color: #15803d;
        --bs-link-hover-color: #166534;
    }
    body {
        font-family: 'Inter', system-ui, sans-serif;
        background: var(--bg);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    main { flex: 1; }

    /* Navbar */
    .navbar-brand { font-weight: 700; letter-spacing: -.02em; }
    .navbar { background: linear-gradient(135deg, var(--brand), var(--brand-dark)); }
    .nav-link { font-weight: 500; border-radius: .5rem; padding: .5rem .9rem !important; }
    .nav-link:hover { background: rgba(255,255,255,.15); }
    .nav-link.active { background: rgba(255,255,255,.25); }

    /* Card */
    .page-card {
        background: #fff;
        border: 1px solid #e3f1e7;
        border-radius: 1rem;
        box-shadow: 0 4px 24px rgba(22, 101, 52, .07);
        padding: 1.75rem;
    }

    /* Buttons */
    .btn, .form-control, .form-select { border-radius: .6rem; }

    .btn-primary {
        --bs-btn-bg: var(--brand);
        --bs-btn-border-color: var(--brand);
        --bs-btn-hover-bg: var(--brand-dark);
        --bs-btn-hover-border-color: var(--brand-dark);
        --bs-btn-active-bg: #166534;
        --bs-btn-active-border-color: #166534;
        --bs-btn-focus-shadow-rgb: var(--brand-rgb);
    }
    .btn-outline-primary {
        --bs-btn-color: var(--brand-dark);
        --bs-btn-border-color: var(--brand);
        --bs-btn-hover-bg: var(--brand);
        --bs-btn-hover-border-color: var(--brand);
        --bs-btn-hover-color: #fff;
        --bs-btn-active-bg: var(--brand-dark);
        --bs-btn-active-border-color: var(--brand-dark);
        --bs-btn-active-color: #fff;
        --bs-btn-focus-shadow-rgb: var(--brand-rgb);
    }

    .btn-submit { transition: transform .15s ease, box-shadow .15s ease; }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(22, 163, 74, .35);
    }
    .btn-submit:active { transform: translateY(0); }

    /* Forms */
    .form-control:focus, .form-select:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 .2rem rgba(22, 163, 74, .18);
    }
    .input-group-text {
        background: var(--brand-soft);
        color: var(--brand-dark);
        border-radius: .6rem 0 0 .6rem;
    }
    .input-group > .form-control { border-radius: 0 .6rem .6rem 0; }
    .form-label { font-size: .875rem; }
    .invalid-feedback { color: #dc2626; }

    /* Tables */
    .table > :not(caption) > * > * { padding: .85rem 1rem; vertical-align: middle; }
    .table thead th {
        font-size: .75rem;
        text-transform: uppercase;
        letter-spacing: .05em;
        color: var(--brand-dark);
        background: var(--brand-soft);
        border-bottom: 1px solid #d1ead8;
    }
    .table-hover tbody tr:hover { background: var(--brand-soft); }

    /* Badges / alerts */
    .badge.text-bg-light { background: var(--brand-soft) !important; color: var(--brand-dark) !important; border-color: #bbe5c8 !important; }
    .alert-success { background: #ecfdf3; color: #166534; }

    footer { font-size: .875rem; color: #6b7280; }
</style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('students.index') }}">
                <i class="bi bi-mortarboard-fill me-2"></i>Student Records
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto gap-md-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('students.index') ? 'active' : '' }}"
                           href="{{ route('students.index') }}">
                            <i class="bi bi-people me-1"></i>All Students
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('students.create') ? 'active' : '' }}"
                           href="{{ route('students.create') }}">
                            <i class="bi bi-person-plus me-1"></i>Add Student
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container py-4 py-md-5">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-3">
                <strong>Please fix the following:</strong>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="page-card">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-3">
        &copy; {{ date('Y') }} Student Records
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>