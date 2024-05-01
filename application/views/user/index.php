<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
               
                <div class="row">

                        <?php if (is_null($user['status'])): ?>
                        <!-- Jika Status Null -->
                        <div class="col-lg-8 mb-4 order-0">
                          <div class="card">
                            <div class="d-flex align-items-end row">
                              <div class="col-sm-7">
                                <div class="card-body">
                                  <h5 class="card-title text-primary">Selamat Datang <?php echo $user['nama']; ?></h5>
                                  <p class="mb-4">
                                    Selalu semangat dan jangan lupa bersyukur. Harap isi semua dokumen yang diperlukan dalam proses penerimaan.
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

                        <?php elseif ($user['status'] == 0): ?>
                        <!-- Jika Status 0 -->
                        <div class="col-lg-8 mb-4 order-0">
                          <div class="card">
                            <div class="d-flex align-items-end row">
                              <div class="col-sm-7">
                                <div class="card-body">
                                  <h5 class="card-title text-primary">Terimakasih Atas Partisipasinya <?php echo $user['nama']; ?></h5>
                                  <p class="mb-4">
                                    Maaf Anda <b>Tidak Lulus Penerimaan</b>. Silahkan Coba Lain Waktu, Jangan Putus Asa dan Terus Semangat
                                  </p>
                                </div>
                              </div>
                              <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                  <img
                                    src="<?php echo base_url('assets/'); ?>img/illustrations/girl-apologize.png"
                                    height="140"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/girl-apologize-dark.png"
                                    data-app-light-img="illustrations/girl-apologize-light.png"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <?php elseif ($user['status'] == 1): ?>
                          <!-- Jika Status 1 -->
                          <div class="col-lg-8 mb-4 order-0">
                          <div class="card">
                            <div class="d-flex align-items-end row">
                              <div class="col-sm-7">
                                <div class="card-body">
                                  <h5 class="card-title text-primary">Terimakasih Atas Partisipasinya <?php echo $user['nama']; ?></h5>
                                  <p class="mb-4">
                                    Selamat Anda <b>Lulus Penerimaan</b>. Hubungi Admin dan Semangat Dalam Melakukan Pekerjaan
                                  </p>
                                </div>
                              </div>
                              <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                  <img
                                    src="<?php echo base_url('assets/'); ?>img/illustrations/people-happy.png"
                                    height="140"
                                    alt="View Badge User"
                                    data-app-dark-img="illustrations/people-happy-dark.png"
                                    data-app-light-img="illustrations/people-happy-light.png"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                      
                        <?php endif; ?>
                    <!-- /.container-fluid -->
            </div>

        </div>
        <!-- End of Main Content -->