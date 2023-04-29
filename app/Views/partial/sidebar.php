<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="icon-object border-slate-300 text-center">
            <img src="<?= base_url('startbootstrap') ?>/img/logo-bps.png" width="70"></img>
        </div>
        <h7 class="font-weight-bold">APP BMN</h7>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($tittle == 'Dashboard') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/admin')?>">           
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Pegawai -->
    <li class="nav-item <?= ($tittle == 'Pegawai') ? 'active' : '' ?>">
        <a class="nav-link" href="pegawai">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pegawai</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= ($tittle == 'Barang') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="<?= base_url('/barang')?>">             
        <i class="fas fa-fw fa-table"></i>
                <span>Data Barang</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= ($tittle == 'Ruang') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="ruang" >
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Ruang</span>
        </a>
    </li>

    <!-- Nav Item - Pemeliharaan -->
    <li class="nav-item <?= ($tittle == 'Pemeliharaan Barang') ? 'active' : '' ?>">
        <a class="nav-link" href="pemeliharaan">
            <i class="fas fa-fw fa-table"></i>
            <span>Pemeliharaan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->