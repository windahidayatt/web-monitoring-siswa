<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Monitoring<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $page_name == 'Dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    @can('administrator')
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Pengguna
        </div>

        <!-- Nav Item - Guru -->
        <li class="nav-item {{ $page_name == 'Daftar Guru' || $page_name == 'Tambah Guru' ? 'active' : '' }}">
            <a class="nav-link" href="/pengguna/guru">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Guru</span></a>
        </li>

        <!-- Nav Item - Guru -->
        <li class="nav-item {{ $page_name == 'Daftar Siswa' || $page_name == 'Tambah Siswa' ? 'active' : '' }}">
            <a class="nav-link" href="/pengguna/siswa">
                <i class="fas fa-fw fa-user"></i>
                <span>Siswa</span></a>
        </li>
    @endcan

    @can('teacher')
    
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Profil
        </div>

        <!-- Nav Item - Profil -->
        <li class="nav-item {{ $page_name == 'Detail Data Guru' ? 'active' : '' }}">
            <a class="nav-link" href="/detail-pengguna/guru">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>
                <span>Lihat Profil</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Penilaian
        </div>

        <!-- Nav Item - Nilai -->
        <li class="nav-item {{ $page_name == 'Daftar Nilai' || $page_name == 'Tambah Nilai' ? 'active' : '' }}">
            <a class="nav-link" href="/nilai">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Nilai</span></a>
        </li>
    @endcan
    
    @can('student')
    
        <!-- Divider -->
        <hr class="sidebar-divider">
        
        <!-- Heading -->
        <div class="sidebar-heading">
            Profil
        </div>

        <!-- Nav Item - Profil -->
        <li class="nav-item {{ $page_name == 'Detail Data Siswa' ? 'active' : '' }}">
            <a class="nav-link" href="/detail-pengguna/siswa">
                <i class="fas fa-fw fa-user"></i>
                <span>Lihat Profil</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Penilaian
        </div>

        <!-- Nav Item - Nilai -->
        <li class="nav-item {{ $page_name == 'Daftar Nilai Siswa' ? 'active' : '' }}">
            <a class="nav-link" href="/nilai/siswa">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Nilai</span></a>
        </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->