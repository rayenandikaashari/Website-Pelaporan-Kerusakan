
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Operator') - Maintenance System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #172238;
        }

        .operator-layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 230px;
            min-width: 230px;
            height: 100vh;
            padding: 25px 15px;
            background: #172238;
            color: white;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .brand {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.35;
            margin-bottom: 35px;
            padding: 0 5px;
            color: white;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sidebar .menu {
            display: block;
            width: 100%;
            padding: 13px 14px;
            margin: 0;
            border-radius: 9px;
            color: #dbeafe;
            text-decoration: none;
            font-size: 16px;
            background: transparent;
            transition: background 0.2s;
        }

        .sidebar .menu:hover {
            background: #293c5d;
            color: white;
        }

        .sidebar .menu.active {
            background: #2864ed;
            color: white;
        }

        .sidebar .logout {
            margin-top: 30px;
        }

        .sidebar .logout button {
            width: 100%;
            padding: 11px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            background: #f3f4f6;
            color: #111827;
        }

        .sidebar .logout button:hover {
            background: #e5e7eb;
        }

        /* KONTEN UTAMA */
        .main-content {
            flex: 1;
            min-width: 0;
            margin-left: 230px;
            padding: 32px;
        }

        .page-header {
            background: white;
            padding: 24px;
            border: 1px solid #e0e7f0;
            border-radius: 12px;
            margin-bottom: 22px;
        }

        .page-header h1 {
            margin: 0 0 12px;
            font-size: 27px;
            font-weight: bold;
            color: #172238;
        }

        .page-header p {
            margin: 0;
            color: #64748b;
        }

        .content-card,
        .card,
        .panel {
            background: white;
            border: 1px solid #e0e7f0;
            border-radius: 10px;
            padding: 22px;
            margin-bottom: 22px;
        }

        /* DASHBOARD */
        .welcome {
            padding: 25px;
            margin-bottom: 22px;
            color: white;
            background: linear-gradient(110deg, #203f91, #2864ed);
            border-radius: 10px;
        }

        .welcome h2 {
            font-size: 28px;
            font-weight: bold;
            margin: 16px 0;
            color: white;
        }

        .welcome p {
            color: white;
        }

        .button {
            display: inline-block;
            background: white;
            color: #2458ce;
            padding: 11px 15px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
        }

        .button:hover {
            background: #eff6ff;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 22px;
        }

        .stats .card {
            margin-bottom: 0;
        }

        .number {
            font-size: 28px;
            font-weight: bold;
            margin-top: 10px;
        }

        .muted {
            color: #64748b;
            font-size: 13px;
        }

        /* FORM DAN TABEL */
        .content-card table {
            border-collapse: collapse;
        }

        .content-card th {
            background: #f8fafc;
            font-weight: 600;
        }

        .content-card th,
        .content-card td {
            border-bottom: 1px solid #e2e8f0;
        }

        .alert-success {
            padding: 12px 16px;
            margin-bottom: 18px;
            background: #dcfce7;
            color: #166534;
            border-radius: 8px;
        }

        .alert-error {
            padding: 12px 16px;
            margin-bottom: 18px;
            background: #fee2e2;
            color: #991b1b;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 190px;
                min-width: 190px;
            }

            .main-content {
                margin-left: 190px;
                padding: 16px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="operator-layout">

        @include('layouts.partials.sidebar')

        <main class="main-content">

            <header class="page-header">
                <h1>@yield('heading', 'Dashboard Operator')</h1>
                <p>@yield('description', 'Ringkasan laporan kerusakan mesin Anda.')</p>
            </header>

            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    <strong>Periksa kembali data berikut:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </main>
    </div>

</body>
</html>
