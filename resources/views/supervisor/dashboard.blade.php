
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Supervisor</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f3f6fb; color: #172238; }
        .sidebar { position: fixed; inset: 0 auto 0 0; width: 205px; padding: 24px 14px; background: #172238; color: white; overflow-y: auto; }
        .brand { font-weight: bold; margin-bottom: 28px; }
        .section { font-size: 11px; font-weight: bold; color: #94a3b8; margin: 22px 10px 8px; }
        .menu { display: block; padding: 10px; margin-bottom: 5px; border-radius: 7px; color: #dbeafe; text-decoration: none; font-size: 14px; }
        .menu.active { background: #2864ed; color: white; }
        .main { margin-left: 205px; padding: 28px; }
        .topbar, .card, .panel { background: white; border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px; }
        .topbar { margin-bottom: 20px; }
        .stats { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; margin-bottom: 22px; }
        .number { font-size: 28px; font-weight: bold; margin-top: 10px; }
        .muted { color: #64748b; font-size: 13px; }
        .logout { margin-top: 24px; }
        .logout button { width: 100%; padding: 10px; cursor: pointer; border: 0; border-radius: 6px; }
        .status { display: inline-block; padding: 5px 9px; border-radius: 20px; background: #fef3c7; color: #92400e; font-size: 12px; }
        @media (max-width: 700px) {
            .sidebar { width: 145px; }
            .main { margin-left: 145px; padding: 14px; }
            .stats { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="brand">Sistem Maintenance<br><small>Supervisor</small></div>

        <a class="menu active" href="{{ route('supervisor.dashboard') }}">Dashboard</a>
        <a class="menu" href="#">Status Mesin</a>
        <a class="menu" href="#">Laporan Kerusakan</a>
        <a class="menu" href="#">Laporan Maintenance</a>

        <div class="section">RIWAYAT</div>
        <a class="menu" href="#">Riwayat Kerusakan</a>
        <a class="menu" href="#">Riwayat Perbaikan</a>
        <a class="menu" href="#">Penggunaan Sparepart</a>

        <div class="section">DATA MASTER</div>
        <a class="menu" href="#">Data Mesin</a>
        <a class="menu" href="#">Data Sparepart</a>
        <a class="menu" href="#">Data Pengguna</a>

        <form class="logout" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </aside>

    <main class="main">
        <header class="topbar">
            <h2>Dashboard Supervisor</h2>
            <p class="muted">Pantau kondisi mesin dan aktivitas maintenance.</p>
        </header>

        <section>
            <h3>Ringkasan Sistem</h3>
            <p class="muted">Informasi keseluruhan kondisi mesin dan laporan maintenance.</p>

            <div class="stats">
                <div class="card">
                    <div class="muted">Total Mesin</div>
                    <div class="number">0</div>
                </div>
                <div class="card">
                    <div class="muted">Mesin Normal</div>
                    <div class="number">0</div>
                </div>
                <div class="card">
                    <div class="muted">Perlu Perbaikan</div>
                    <div class="number">0</div>
                </div>
            </div>
        </section>

        <section class="panel">
            <h3>Laporan Terbaru</h3>
            <p class="muted">Laporan kerusakan mesin terbaru akan tampil di sini.</p>
            <p>Belum ada laporan.</p>
        </section>
    </main>
</body>
</html>