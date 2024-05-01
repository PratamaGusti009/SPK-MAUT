<!-- Sidebar -->
<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/demo.css" />
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <span class="app-brand-text demo menu-text fw-bolder ms-2">Pendaftaran</span>
          
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div><div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">

            <!-- Dashboard -->
            <li class="menu-item <?php echo ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == 'index') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('user/index'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>

            <!-- Penilaian -->
            <li class="menu-item <?php echo ($this->uri->segment(1) == 'formulir' && $this->uri->segment(2) == 'detail') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('formulir/detail'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                <div data-i18n="Basic">Isi Formulir</div>
                </a>
            </li>
            
            <!-- Hasil Akhir -->
            <li class="menu-item <?php echo ($this->uri->segment(1) == 'formulir' && $this->uri->segment(2) == 'detailPenilaian') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('formulir/detailPenilaian'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                <div data-i18n="Basic">Isi Data</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
            
            <!-- Profile -->
            <li class="menu-item <?php echo ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == 'profile') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('user/profile'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">Profile</div>
                </a>
            </li>

            <!-- Keluar -->
            <li class="menu-item">
                <a href="<?php echo base_url('auth/logout'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Basic">Keluar</div>
                </a>
            </li>

            </ul>
            </aside>    
            