<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SIMP</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SP</a>
        </div>
        <ul class="sidebar-menu">
            <li class={{ request()->routeIs('dashboard') ? 'active' : ' ' }}><a class="nav-link" href="{{ url('/dashboard') }}"><i class="fa-solid fa-layer-group"></i> <span>Dashboard</span></a></li>
            <li class="{{ request()->routeIs('karyawan.index') ? 'active' : ' ' }}"><a class="nav-link" href="{{ url('/dashboard/karyawan') }}"><i class="fa-solid fa-users"></i> <span>Karyawan</span></a></li>
            <li class="{{ request()->routeIs('karyawan.index') ? 'active' : ' ' }}"><a class="nav-link" href="{{ url('/dashboard/department') }}"><i class="fa-solid fa-building"></i> <span>Department</span></a></li>
            <li class="{{ request()->routeIs('proyek.index') ? 'active' : ' ' }}"><a class="nav-link" href="{{ url('/dashboard/proyek') }}"><i class="fa-solid fa-folder"></i> <span>Projects</span></a></li>
            <li class="{{ request()->routeIs('laporan.index') ? 'active' : ' ' }}"><a class="nav-link" href="{{ url('/dashboard/laporan') }}"><i class="fa-solid fa-paper-plane"></i> <span>Laporan</span></a></li>
            <li class="{{ request()->routeIs('klien.index') ? 'active' : ' ' }}"><a class="nav-link" href="{{ url('/dashboard/klien') }}"><i class="fa-solid fa-circle-user"></i> <span>Klien</span></a></li>
        </ul>
    </aside>
</div>
