 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa-solid fa-building-user"></i>
    </div>
    <div class="sidebar-brand-text mx-3">CV. Vilia Alam Sejahtera</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

 <!-- Heading -->
 <div class="sidebar-heading">
    Admin
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('admin/index'); ?>">
        <i class="fas fa-fw fa-home"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Master Data
</div>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Syarat/index'); ?>">
        <i class="fas fa-fw fa-cube"></i>
        <span>Data Kriteria</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('sub_kriteria/index'); ?>">
        <i class="fas fa-fw fa-cubes"></i>
        <span>Data Sub Kriteria</span></a>
</li>

 <!-- Nav Item - Charts -->
 <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Alternatif/index'); ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Data Alternatif</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Penilaian/index'); ?>">
        <i class="fas fa-fw fa-edit"></i>
        <span>Data Penilaian</span></a>
</li>

 <!-- Nav Item - Charts -->
 <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Perhitungan/index'); ?>">
        <i class="fas fa-fw fa-calculator"></i>
        <span>Data Pehitungan</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Perhitungan/hasil'); ?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Data Hasil Akhir</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
                <span>Master User</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo base_url('Departemen/list_departemen'); ?>">Departemen</a>
                <a class="collapse-item" href="<?php echo base_url('Admin/user_admin'); ?>">Users</a>
                <a class="collapse-item" href="cards.html">Profile</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">
    <i class="fas fa-sign-out-alt"></i>
        <span>Keluar</span></a>
</li>

 <!-- Sidebar Toggler (Sidebar) -->
 <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->