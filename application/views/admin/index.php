<!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Selamat Datang <?php echo $user['nama']; ?></h5>
                          <p class="mb-4">
                            Selalu semangat dan jangan lupa bersyukur. Kamu bisa cek apakah ada <span class="fw-bold">Alternatif / Pelamar</span>
                            yang baru mendaftar atau nilai yang belum dimasukan melalui notifikasi dibawah.
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?php echo base_url('assets/'); ?>img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                 <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">Statistik Pendaftar</h5>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-column align-items-left gap-1">
                                  <h2 class="mb-2"><?php echo $hitung_alternatif; ?></h2>
                                    <span>Total Pendaftar</span>
                                </div>
                                <canvas id="myPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card -->
                <div class="row row-cols-1 row-cols-md-3 g-4">
                  <div class="col">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="card-title">Kriteria</h5>
                        <?php if ($hitung_kriteria > 0) { ?>
                                    <?php echo $hitung_kriteria; ?> Kriteria Kosong, Tolong Isi Kriteria
                            <?php } ?>
                        </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="card-title">Sub Kriteria</h5>
                        
                        </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="card-title">Penilaian</h5>
                        <?php if ($hitung_penilaian > 0) { ?>
                                    <!-- Tampilkan notifikasi -->
                                    <?php echo $hitung_penilaian; ?> Alternatif belum dinilai
                            <?php } ?>
                        </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="card-title">Hasil</h5>
                        <?php if ($hitung_penilaian > 0) { ?>
                                    <?php echo $hitung_penilaian; ?> Alternatif / Pelamar belum ditentukan lulus atau tidak
                            <?php } ?>
                        </div>
                    </div>
                  </div>
                  
                  </div>
                </div>
    <!-- / Layout wrapper -->