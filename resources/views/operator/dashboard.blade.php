
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Operator</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #172238;
        }
        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 205px;
            padding: 24px 14px;
            background: #172238;
            color: white;
        }
        .brand { font-weight: bold; margin-bottom: 32px; }
        .menu {
            display: block;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 7px;
            color: #dbeafe;
            text-decoration: none;
        }
        .menu.active { background: #2864ed; color: white; }
        .main { margin-left: 205px; padding: 28px; }
        .topbar, .card, .panel {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px;
        }
        .topbar { margin-bottom: 20px; }
        .welcome {
            padding: 25px;
            margin-bottom: 20px;
            color: white;
            background: linear-gradient(110deg, #203f91, #2864ed);
            border-radius: 10px;
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
        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 22px;
        }
        .number { font-size: 28px; font-weight: bold; margin-top: 10px; }
        .muted { color: #64748b; font-size: 13px; }
        .logout { margin-top: 30px; }
        .logout button {
            width: 100%; padding: 10px; cursor: pointer;
            border: 0; border-radius: 6px;
        }
        @media (max-width: 700px) {
            .sidebar { width: 145px; }
            .main { margin-left: 145px; padding: 14px; }
            .stats { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="brand">Maintenance<br><small>System</small></div>
        <a class="menu active" href="{{ route('operator.dashboard') }}">Dashboard</a>
        <a class="menu" href="#">Laporan Kerusakan</a>
        <a class="menu" href="#">Buat Laporan</a>

        <form class="logout" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </aside>

    <main class="main">
        <header class="topbar">
            <h2>Dashboard Operator</h2>
            <p class="muted">Ringkasan laporan kerusakan mesin Anda.</p>
        </header>

        <section class="welcome">
            <p>Selamat datang kembali,</p>
            <h2>{{ auth()->user()->name }}</h2>
            <p>Pantau laporan kerusakan mesin yang telah Anda buat.</p>
            <a class="button" href="#">+ Buat Laporan</a>
        </section>

        <section class="stats">
            <div class="card">
                <div class="muted">Total Laporan</div>
                <div class="number">0</div>
            </div>
            <div class="card">
                <div class="muted">Menunggu Ditangani</div>
                <div class="number">0</div>
            </div>
            <div class="card">
                <div class="muted">Selesai Diperbaiki</div>
                <div class="number">0</div>
            </div>
        </section>

        <section class="panel">
            <h3>Laporan Terbaru</h3>
            <p class="muted">Laporan yang Anda buat akan tampil di sini.</p>
            <p>Belum ada laporan.</p>
        </section>
    </main>
</body>
</html>
