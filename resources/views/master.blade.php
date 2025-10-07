<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page-title', 'App Pegawai')</title>

    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* ✅ Sticky navbar */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        footer {
            background-color: #e9ecef;
            color: #333;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
            border-top: 1px solid #ccc;
        }

        main {
            min-height: 80vh;
            padding-top: 20px;
            padding-bottom: 60px;
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .navbar-nav .nav-link:hover {
            color: #0d6efd !important;
            text-decoration: underline;
        }

        .navbar-nav .nav-link.active {
            color: #0d6efd !important;
            font-weight: 600;
        }
    </style>
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">App Pegawai</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ url('/employees') }}">Employee</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/departments') }}">Department</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/positions') }}">Positions</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/attendance') }}">Attendance</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/salaries') }}">Salary</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/report') }}">Report</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/settings') }}">Settings</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- ✅ Main Content -->
<main class="container">
    @yield('content')
</main>

<!-- ✅ Footer -->
<footer>
    <p>&copy; {{ date('Y') }} App Pegawai — Sistem Manajemen Pegawai</p>
</footer>

</body>
</html>
