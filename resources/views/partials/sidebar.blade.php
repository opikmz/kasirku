<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>Kasir </sup> Muhitek</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kasir
    </div>
    <li class="nav-item {{ request()->is('kasir') ? 'active' : '' }}">
        <a class="nav-link" href="/kasir">
            <i class="fas fa-fw fa-table"></i>
            <span>Kasir</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabel" aria-expanded="true"
            aria-controls="tabel">
            <i class="fas fa-fw fa-folder"></i>
            <span>Tabel</span>
        </a>
        <div id="tabel" class="collapse {{ request()->is('produk') ? 'active' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tabel</h6>
                <a class="collapse-item" href="/produk" actived>Produk</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#keuangan" aria-expanded="true"
            aria-controls="keuangan">
            <i class="fas fa-fw fa-folder"></i>
            <span>Keuangan</span>
        </a>
        <div id="keuangan" class="collapse  {{ request()->is('riwayat_pembelian') ? 'active' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tabel</h6>
                <a class="collapse-item" href="/riwayat_pembelian" actived>Riwayat Pembelian</a>
            </div>
        </div>
    </li>
    @if (Auth::user()->role == 'manager')
        <div class="sidebar-heading">
            User
        </div>
        <li class="nav-item {{ request()->is('user') ? 'active' : '' }}">
            <a class="nav-link" href="/user">
                <i class="fas fa-fw fa-table"></i>
                <span>User</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
