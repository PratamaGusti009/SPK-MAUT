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
              <span class="app-brand-text demo menu-text fw-bolder ms-2">admin</span>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
              <li class="menu-item <?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'admin') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('admin/index'); ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>

              <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>

                  <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-data"></i>
                      <div data-i18n="Account Settings">Data</div>
                    </a>
                    <ul class="menu-sub">
                        <!-- Data Kriteria -->
                        <li class="menu-item <?php echo ($this->uri->segment(1) == 'Syarat' && $this->uri->segment(2) == 'index') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url('Syarat/index'); ?>" class="menu-link">
                            <div data-i18n="Account">Data Kriteria</div>
                          </a>
                        </li>

                        <!-- Data Sub Kriteria -->
                        <li class="menu-item <?php echo ($this->uri->segment(1) == 'sub_kriteria' && $this->uri->segment(2) == 'index') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url('sub_kriteria/index'); ?>" class="menu-link">
                            <div data-i18n="Account">Data Sub Kriteria</div>
                          </a>
                        </li>

                        <!-- Data Alternatif -->
                        <li class="menu-item <?php echo ($this->uri->segment(1) == 'Alternatif' && $this->uri->segment(2) == 'index') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url('Alternatif/index'); ?>" class="menu-link">
                            <div data-i18n="Connections">Data Alternatif</div>
                          </a>
                        </li>

                        <!-- Data Departemen -->
                        <li class="menu-item <?php echo ($this->uri->segment(1) == 'Departemen' && $this->uri->segment(2) == 'list_departemen') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url('Departemen/list_departemen'); ?>" class="menu-link">
                            <div data-i18n="Connections">Data Departemen</div>
                          </a>
                        </li>

                        <!-- Data Admin -->
                        <li class="menu-item <?php echo ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'user_admin') ? 'active' : ''; ?>">
                          <a href="<?php echo base_url('Admin/user_admin'); ?>" class="menu-link">
                            <div data-i18n="Connections">Data Admin</div>
                          </a>
                        </li>
                   </ul>
            </li>
            

              <!-- Penilaian -->
              <li class="menu-item <?php echo ($this->uri->segment(1) == 'Penilaian' && $this->uri->segment(2) == 'index') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Penilaian/index'); ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-edit-alt"></i>
                  <div data-i18n="Basic">Penilaian</div>
                </a>
              </li>

              <!-- Perhitungan -->
              <li class="menu-item <?php echo ($this->uri->segment(1) == 'Perhitungan' && $this->uri->segment(2) == 'index') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Perhitungan/index'); ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-calculator"></i>
                  <div data-i18n="Basic">Perhitungan</div>
                </a>
              </li>

              <!-- Hasil Akhir -->
              <li class="menu-item <?php echo ($this->uri->segment(1) == 'Perhitungan' && $this->uri->segment(2) == 'hasil') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Perhitungan/hasil'); ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-check-double"></i>
                  <div data-i18n="Basic">Hasil Akhir</div>
                </a>
              </li>

              <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
              
              <!-- Profile -->
              <li class="menu-item <?php echo ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'profile') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('Admin/profile'); ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                  <div data-i18n="Basic">Profile</div>
                </a>
              </li>
              
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>

              <!-- Keluar -->
              <li class="menu-item <?php echo ($this->uri->segment(1) == 'auth' && $this->uri->segment(2) == 'logout') ? 'active' : ''; ?>">
                <a href="<?php echo base_url('auth/logout'); ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-log-out"></i>
                  <div data-i18n="Basic">Keluar</div>
                </a>
              </li>
          </ul>
        </aside>