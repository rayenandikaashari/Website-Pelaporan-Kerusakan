
<aside class="sidebar">
    <div class="brand">
        Maintenance<br>
        System
    </div>

    <nav class="sidebar-menu">
        <a href="{{ route('operator.dashboard') }}"
           class="menu {{ request()->routeIs('operator.dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('operator.laporan.index') }}"
           class="menu {{ request()->routeIs('operator.laporan.index', 'operator.laporan.show') ? 'active' : '' }}">
            Laporan Kerusakan
        </a>

        <a href="{{ route('operator.laporan.create') }}"
           class="menu {{ request()->routeIs('operator.laporan.create') ? 'active' : '' }}">
            Buat Laporan
        </a>
    </nav>

    <form class="logout" method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</aside>
