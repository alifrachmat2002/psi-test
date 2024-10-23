<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink "></i>
        </div>
        <div class="sidebar-brand-text mx-3">Psi-Test</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Home</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('hasil.index') }}">
            <i class="fas fa-check fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Hasil</span></a>
    </li>

    @can('manage-users')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>User</span></a>
        </li>
    @endcan
    @can('manage-rekap')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.rekap') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Rekap Hasil</span></a>
        </li>
    @endcan

    <li class="nav-item">
        <a class="nav-link" href="download.php">
            <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Download</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contact.php">
            <i class="fas fa-phone fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Kontak</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
