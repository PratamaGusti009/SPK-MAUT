<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="mb-4">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Selamat datang
                    <span class="text-uppercase"><b>
                            <?php echo $user['nama']; ?>!
                        </b></span> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di
                    bawah.
                </div>
                <div class="row">

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a
                                                href="<?php echo base_url('syarat/index'); ?>"
                                                class="text-secondary text-decoration-none">Data Kriteria</a></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-cube fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a
                                                href="<?php echo base_url('sub_kriteria/index'); ?>"
                                                class="text-secondary text-decoration-none">Data Sub Kriteria</a></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-cubes fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a
                                                href="<?php echo base_url('Alternatif/index'); ?>"
                                                class="text-secondary text-decoration-none">Data Alternatif</a></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-secondary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <a href="<?php echo base_url('Penilaian/index'); ?>" class="text-secondary text-decoration-none">Data Penilaian</a>
                                        </div>
                                        <!-- Tambahkan baris di bawah untuk menampilkan jumlah penilaian berdasarkan kriteria 25 -->
                                        <!-- Periksa apakah ada alternatif yang belum dinilai -->
                                            <?php if ($unratedCount > 0) { ?>
                                                <div class="small text-danger"><?php echo $unratedCount; ?> Alternatif belum dinilai</div>
                                            <?php } ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-edit fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a
                                                href="<?php echo base_url('Perhitungan/index'); ?>"
                                                class="text-secondary text-decoration-none">Data Perhitungan</a></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calculator fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <a href="<?php echo base_url('perhitungan/hasil'); ?>"
                                            class="text-secondary text-decoration-none">Data Hasil Akhir</a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                                <?php if ($hitung_penilaian > 0) { ?>
                                    <!-- Tampilkan notifikasi -->
                                    <div class="small text-danger"><?php echo $hitung_penilaian; ?> Alternatif belum dinilai</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                        <!-- Bar Chart -->
                        <div class="col-xl-8 col-md-6 mb-4 chart-container">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    Styling for the bar chart can be found in the
                                    <code>/js/demo/chart-bar-demo.js</code> file.
                                </div>
                            </div>
                        </div>

                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="text-center">
                                        <hr>
                                        Perbandingan Jumlah Pendaftar Pria & Wanita
                                    </div>

                                </div>
                            </div>
                        </div>

                        <script>
                           // Variabel global untuk menyimpan referensi ke grafik Donut (Pie Chart)
                            var myPieChart;

                            document.addEventListener('DOMContentLoaded', function() {
                                // Data untuk Donut Chart
                                var data = {
                                    labels: ['Pria', 'Wanita'],
                                    datasets: [{
                                        data: [<?php echo $maleCount; ?>, <?php echo $femaleCount; ?>],
                                        backgroundColor: ['#4e73df', '#1cc88a']
                                    }]
                                };

                                // Konfigurasi Donut Chart
                                var options = {
                                maintainAspectRatio: false,
                                responsive: true,
                                tooltips: {
                                    bodyFontFamily: 'Arial', // Font untuk penjelasan
                                    bodyFontSize: 14, // Ukuran font penjelasan
                                    backgroundColor: "rgb(255,255,255)",
                                    bodyFontColor: "#858796",
                                    borderColor: '#dddfeb',
                                    borderWidth: 1,
                                    xPadding: 15,
                                    yPadding: 15,
                                    displayColors: false,
                                    caretPadding: 10,
                                },
                                legend: {
                                    display: false
                                }
                            };

                                // Buat atau perbarui Donut Chart
                                var ctx = document.getElementById('myPieChart').getContext('2d');
                                
                                // Hapus grafik sebelumnya jika ada
                                if (myPieChart) {
                                    myPieChart.destroy();
                                }

                                // Buat grafik baru dan simpan referensi ke variabel global `myPieChart`
                                myPieChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: data,
                                    options: options
                                });
                            });
                        </script>

                    </div>


                    

                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->